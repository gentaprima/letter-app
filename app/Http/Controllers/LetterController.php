<?php

namespace App\Http\Controllers;

use App\Models\ArsipModel;
use App\Models\EvaluationLetter;
use App\Models\ModelLetter;
use App\Models\ModelUsers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class LetterController extends Controller
{
    public function index($type)
    {
        $data['users'] = ModelUsers::select('id', 'full_name', 'role')->get();
        $data['letter'] = ModelLetter::select('surat.*', 'tbl_users.role', 'tbl_users.id as id_users', 'full_name')->leftJoin('tbl_users', 'surat.id_users', '=', 'tbl_users.id')
            ->where('type', $type);
        if (session("users")['role'] !== 0 && session("users")['role'] !== 4) {
            $data['letter'] = $data['letter']->where('id_users', session("users")['id']);
        }
        $data['letter'] = $data['letter']->paginate(10);
        $i = 1;
        if ($type == 0) {
            $data['title'] = "Data Surat Masuk";
        } else {
            $data['title'] = "Data Surat Keluar";
        }
        foreach ($data['users'] as $user) {
            if ($user->role == 0) {
                $user->role = "Admin";
            }
            if ($user->role == 1) {
                $user->role = "Waka Kesiswaan";
            }

            if ($user->role == 2) {
                $user->role = "Waka Kurikulum";
            }

            if ($user->role == 3) {
                $user->role = "Waka Hubin";
            }
            if ($user->role == 4) {
                $user->role = "Kepala Sekolah";
            }
        }
        foreach ($data['letter'] as $letter) {
            $letter->no = $i;
            $disposisi = DB::table("tindak_lanjut")->where("id_surat", $letter->id)->join('tbl_users', 'tindak_lanjut.disposisi', 'tbl_users.id');
            $disposisiLast = $disposisi->first();
            $countDisposisi = $disposisi->get()->count();
            if ($letter->role == 0) {
                $letter->role = "Admin";
            }
            if ($letter->role == 1) {
                $letter->role = "Waka Kesiswaan";
            }

            if ($letter->role == 2) {
                $letter->role = "Waka Kurikulum";
            }

            if ($letter->role == 3) {
                $letter->role = "Waka Hubin";
            }
            if ($user->role == 4) {
                $user->role = "Kepala Sekolah";
            }
            if ($countDisposisi > 0) {
                $letter->disposisi_name = $disposisiLast->full_name;
                if ($disposisiLast->role == 0) {
                    $letter->disposisiRole = "Admin";
                }
                if ($disposisiLast->role == 1) {
                    $letter->disposisiRole = "Waka Kesiswaan";
                }

                if ($disposisiLast->role == 2) {
                    $letter->disposisiRole = "Waka Kurikulum";
                }

                if ($disposisiLast->role == 3) {
                    $letter->disposisiRole = "Waka Hubin";
                }
                if ($disposisiLast->role == 4) {
                    $letter->disposisiRole = "Kepala Sekolah";
                }

                $letter->number_of_disposisi = $countDisposisi;
            }
            $i++;
        }
        return view('surat_masuk', $data);
    }

    public function add($type)
    {
        $data['last_id'] = ModelLetter::count() + 1;
        $array_bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $data['month'] = $array_bln[date('n')];

        $data['users'] = ModelUsers::select('id', 'full_name', 'role')->get();
        if ($type == 0) {
            $data['title'] = "Tambah Surat Masuk";
        } else {
            $data['title'] = "Tambah Surat Keluar";
        }
        foreach ($data['users'] as $user) {
            if ($user->role == 0) {
                $user->role = "Admin";
            }
            if ($user->role == 1) {
                $user->role = "Waka Kesiswaan";
            }

            if ($user->role == 2) {
                $user->role = "Waka Kurikulum";
            }

            if ($user->role == 3) {
                $user->role = "Waka Hubin";
            }
            if ($user->role == 4) {
                $user->role = "Kepala Sekolah";
            }
        }
        return view('add_surat', $data);
    }
    public function store(Request $request, $type)
    {
        $validate = Validator::make($request->all(), [
            '*' => 'required',
        ]);
        if ($validate->fails()) {
            $request->session()->flash('icon', 'warning');
            $request->session()->flash('title', 'warning');
            $request->session()->flash('message', $validate->errors()->first());
        }
        $file = $request->file('foto_lampiran');
        $softCopy = $request->file("soft_copy");
        $fileNames = "";
        foreach ($file as $f) {
            $name = uniqid() . ".jpg";
            Storage::disk("uploads")->put($name, file_get_contents($f));
            $fileNames .= $name . ",";
        }
        $softCopyName =  "pdf/" . uniqid() . ".pdf";
        Storage::disk("uploads")->put($softCopyName, file_get_contents($softCopy));
        $input = $request->all();
        $input['id_users'] = isset($input['id_users']) ? $input['id_users'] : null;
        $input['kepada'] = isset($input['kepada']) ? $input['kepada'] : null;
        $input['is_arsip'] = false;
        $input['type'] = $type;
        $input['soft_copy'] = $softCopyName;
        $input['foto_lampiran'] = substr($fileNames, 0, strlen($fileNames) - 1);
        ModelLetter::create($input);
        $request->session()->flash('icon', 'success');
        $request->session()->flash('title', 'Success');
        $request->session()->flash('message', 'Berhasil Menambahkan Surat');
        return redirect()->back();
    }

    public function acceptOutLetter(Request $request, $id)
    {
        $data = ModelLetter::find($id);
        $data->update([
            'is_out_letter_approve' => 1,
            'is_arsip' => 1
        ]);
        DB::table("arsip")->insert([
            'id_surat' => $id,
            'tanggal_arsip' => date("Y-m-d"),
            'keterangan' => $request->keterangan
        ]);
        Session::flash('icon', 'success');
        Session::flash('title', 'Success');
        Session::flash('message', 'Berhasil Acc Surat Keluar');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $letter = ModelLetter::find($id);
        $letter->delete();
        Session::flash('icon', 'success');
        Session::flash('title', 'Success');
        Session::flash('message', 'Berhasil Menghapus Surat');
        return redirect()->back();
    }

    public function show($id, $type)
    {
        $data['letter'] = ModelLetter::select('surat.*', 'tbl_users.role', 'tbl_users.id as id_users', 'full_name')->leftJoin('tbl_users', 'surat.id_users', '=', 'tbl_users.id')
            ->where('type', $type)->find($id);
        $data['letter']->foto_lampiran = explode(',', $data['letter']->foto_lampiran);
        $data['users'] = ModelUsers::select('id', 'full_name', 'role')->get();
        $data['isArsip'] = ArsipModel::where('id_surat', $id)->get()->count();
        $data['eval'] = EvaluationLetter::select("*", "tindak_lanjut.id as id_eval")->where('id_surat', $data['letter']->id)->leftJoin('tbl_users', 'tindak_lanjut.disposisi', 'tbl_users.id')->get();
        $data['isEval'] = EvaluationLetter::where('is_approve', 1)->where('id_surat', $data['letter']->id)->get()->count();
        foreach ($data['eval'] as $user) {
            $user['number_of_role'] = $user['role'];
            if ($user->role == 0) {
                $user->role = "Admin";
            }
            if ($user->role == 1) {
                $user->role = "Waka Kesiswaan";
            }

            if ($user->role == 2) {
                $user->role = "Waka Kurikulum";
            }

            if ($user->role == 3) {
                $user->role = "Waka Hubin";
            }

            if ($user->role == 4) {
                $user->role = "Kepala Sekolah";
            }
        }
        foreach ($data['users'] as $user) {
            if ($user->role == 0) {
                $user->role = "Admin";
            }
            if ($user->role == 1) {
                $user->role = "Waka Kesiswaan";
            }

            if ($user->role == 2) {
                $user->role = "Waka Kurikulum";
            }

            if ($user->role == 3) {
                $user->role = "Waka Hubin";
            }

            if ($user->role == 4) {
                $user->role = "Kepala Sekolah";
            }
        }
        return view('detail_surat', $data);
    }

    public function disposisi(Request $request, $id)
    {
        $data = ModelLetter::find($id);
        $data->update([
            'id_users' => $request->id_users,
            'is_arsip' => 1
        ]);
        EvaluationLetter::create([
            'disposisi' => $request->id_users,
            'tanggal' => Carbon::now(),
            'evaluasi' => $request->evaluasi,
            'tindak_lanjut' => $request->tindak_lanjut,
            'id_surat' => $data->id,
            'is_approve' => $request->approve,
            'approve_date' => $request->approve ? Carbon::now() : null
        ]);
        DB::table("arsip")->insert([
            'id_surat' => $id,
            'tanggal_arsip' => date("Y-m-d"),
            'keterangan' => $request->keterangan
        ]);
        return redirect()->back();
    }

    public function report(Request $request, $type)
    {
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $data['users'] = ModelUsers::select('id', 'full_name', 'role')->get();
        if ($startDate != null && $endDate != null) {

            $data['letter'] = ModelLetter::select('surat.*', 'tbl_users.role', 'tbl_users.id as id_users', 'full_name')
                ->leftJoin('tbl_users', 'surat.id_users', '=', 'tbl_users.id')
                ->where('type', $type)
                ->whereBetween('tgl_terima', [$startDate, $endDate])
                ->get();
            $data['filter']  = true;
        } else {
            $data['letter'] = ModelLetter::select('surat.*', 'tbl_users.role', 'tbl_users.id as id_users', 'full_name')
                ->leftJoin('tbl_users', 'surat.id_users', '=', 'tbl_users.id')
                ->where('type', $type)->get();
            $data['filter']  = false;
        }
        $i = 1;
        if ($type == 0) {
            $data['title'] = "Report Surat Masuk";
        } else {
            $data['title'] = "Report Surat Keluar";
        }
        foreach ($data['users'] as $user) {
            if ($user->role == 0) {
                $user->role = "Admin";
            }
            if ($user->role == 1) {
                $user->role = "Waka Kesiswaan";
            }

            if ($user->role == 2) {
                $user->role = "Waka Kurikulum";
            }

            if ($user->role == 3) {
                $user->role = "Waka Hubin";
            }
            if ($user->role == 4) {
                $user->role = "Kepala Sekolah";
            }
        }
        foreach ($data['letter'] as $letter) {
            $letter->no = $i;
            if ($letter->role == 0) {
                $letter->role = "Admin";
            }
            if ($letter->role == 1) {
                $letter->role = "Waka Kesiswaan";
            }

            if ($letter->role == 2) {
                $letter->role = "Waka Kurikulum";
            }

            if ($letter->role == 3) {
                $letter->role = "Waka Hubin";
            }
            if ($user->role == 4) {
                $user->role = "Kepala Sekolah";
            }
            $i++;
        }
        return view("report", $data);
    }

    public function reportOutput(Request $request, $id)
    {
        if ($request->type != 2) {
            $data['letter'] = ModelLetter::select('surat.*', 'tbl_users.role', 'tbl_users.id as id_users', 'full_name')->leftJoin('tbl_users', 'surat.id_users', '=', 'tbl_users.id')
                ->where('type', $request->type)->find($id);
        } else {
            $data['eval'] = EvaluationLetter::select("*", 'tbl_users.id as id_users')->leftJoin('tbl_users', 'tindak_lanjut.disposisi', 'tbl_users.id')->find($id);
        }
        $pdf = Pdf::loadView('print_out', $data);
        return $pdf->download(date('m-d-Y hsi') . '.pdf');
    }

    public function addResponseDisposition(Request $request, $id)
    {
        EvaluationLetter::find($id)->update([
            'response' => $request->response
        ]);
        $request->session()->flash('icon', 'success');
        $request->session()->flash('title', 'Success');
        $request->session()->flash('message', 'Berhasil Mengirim Response Disposisi');
        return redirect()->back();
    }
}
