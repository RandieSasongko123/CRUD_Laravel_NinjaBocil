<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Tailed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\TailedResource;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\Services\SlugService;

class TailedController extends Controller
{
    //
    public function index()
    {
        $taileds = Tailed::with(
            'tailed_skill_1:id,fotoskill,nama_skill,grade_skill,kartegori',
            'tailed_skill_2:id,fotoskill,nama_skill,grade_skill,kartegori',
            'tailed_skill_3:id,fotoskill,nama_skill,grade_skill,kartegori',
            'tailed_skill_4:id,fotoskill,nama_skill,grade_skill,kartegori'
        )->get();

        return TailedResource::collection($taileds);
    }

    public function destroy($id)
    {
        $tailed = Tailed::findOrFail($id);
        $tailed->delete();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'foto_tailed' => 'required',
            'nama_tailed' => 'required',
            'slug_tailed' => 'required',
            'skill_1_tailed' => 'required|exists:skills,id',
            'skill_2_tailed' => 'required|exists:skills,id',
            'skill_3_tailed' => 'required|exists:skills,id',
            'skill_4_tailed' => 'required|exists:skills,id',
        ]);

        $image = null;

        if($request->foto_tailed)
        {
            $filename = $this->generateRandomString();

            $extension = $request->foto_tailed->extension();

            $image = $filename.'.'.$extension;

            Storage::putFileAs('public/image', $request->file('foto_tailed'), $image);
        }

        $request['user_id'] = Auth::user()->id;

        $user_id = Auth::user()->id;

        $tailed = Tailed::create([
            'user_id' => $user_id,
            'foto_tailed' => $image,
            'nama_tailed' => $request->nama_tailed,
            'slug_tailed' => $request->slug_tailed,
            'skill_1_tailed' => $request->skill_1_tailed,
            'skill_2_tailed' => $request->skill_2_tailed,
            'skill_3_tailed' => $request->skill_3_tailed,
            'skill_4_tailed' => $request->skill_4_tailed
        ]);

        return new TailedResource($tailed->loadMissing([
            'tailed_skill_1:id,fotoskill,nama_skill,grade_skill,kartegori',
            'tailed_skill_2:id,fotoskill,nama_skill,grade_skill,kartegori',
            'tailed_skill_3:id,fotoskill,nama_skill,grade_skill,kartegori',
            'tailed_skill_4:id,fotoskill,nama_skill,grade_skill,kartegori'
        ]));

    }

    public function tambahView()
    {
        $data = Skill::all();
        return view('Tailed.create', ['data' => $data]);
    }

    public function tambah(Request $request)
    {

        // dd($request->all());

        $validated = $request->validate([
            'foto_tailed' => 'image',
            'nama_tailed' => 'required',
            'skill_1_tailed' => 'required|exists:skills,id',
            'skill_2_tailed' => 'required|exists:skills,id',
            'skill_3_tailed' => 'required|exists:skills,id',
            'skill_4_tailed' => 'required|exists:skills,id',
        ]);

        $image = null;

        if($request->foto_tailed)
        {
            $filename = $this->generateRandomString();

            $extension = $request->foto_tailed->extension();

            $image = $filename.'.'.$extension;

            Storage::putFileAs('public/image', $request->file('foto_tailed'), $image);
        }

        $tailed = Tailed::create([
            'foto_tailed' => $image,
            'nama_tailed' => $request->nama_tailed,
            'slug_tailed' => $request->slug_tailed,
            'skill_1_tailed' => $request->skill_1_tailed,
            'skill_2_tailed' => $request->skill_2_tailed,
            'skill_3_tailed' => $request->skill_3_tailed,
            'skill_4_tailed' => $request->skill_4_tailed,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('Tailed.dashboard')->with('create', 'Data Berhasil Di Buat');

    }

    public function delete($id)
    {
        $tailed = Tailed::findOrFail($id);
        $tailed->delete();

        return redirect()->route('Tailed.dashboard')->with('delete', 'Data Berhasil Di Hapus');
    }

    public function dashboard()
    {
        $data = Tailed::all();
        return view('Tailed.dashboard', ['data' => $data]);
    }

    public function tampilkandata($id)
    {
        $tailed = Tailed::with(
            'skill_1_tailed:id,fotoskill,nama_skill,grade_skill,kartegori',
            'skill_2_tailed:id,fotoskill,nama_skill,grade_skill,kartegori',
            'skill_3_tailed:id,fotoskill,nama_skill,grade_skill,kartegori',
            'skill_4_tailed:id,fotoskill,nama_skill,grade_skill,kartegori',
        )->findOrFail($id);

        $data = Skill::all();

        return view('Tailed.update', compact('tailed', 'data'));
    }

    public function updatedata(Request $request, $id)
    {
        $tailed = Tailed::findOrFail($id);

        $validated = $request->validate([
            'foto_tailed' => 'image',
            'nama_tailed' => 'required',
            'skill_1_tailed' => 'required|exists:skills,id',
            'skill_2_tailed' => 'required|exists:skills,id',
            'skill_3_tailed' => 'required|exists:skills,id',
            'skill_4_tailed' => 'required|exists:skills,id',
        ]);

        $image = $tailed->foto_tailed;

        if ($request->hasFile('foto_tailed')) {
            $filename = $this->generateRandomString();
            $extension = $request->foto_tailed->extension();
            $image = $filename.'.'.$extension;
            Storage::putFileAs('public/image', $request->file('foto_tailed'), $image);
        }

        $tailed->update([
            'foto_tailed' => $image,
            'nama_tailed' => $request->nama_tailed,
            'slug_tailed' => $request->slug_tailed,
            'skill_1_tailed' => $request->skill_1_tailed,
            'skill_2_tailed' => $request->skill_2_tailed,
            'skill_3_tailed' => $request->skill_3_tailed,
            'skill_4_tailed' => $request->skill_4_tailed
        ]);

        return redirect()->route('Tailed.dashboard')->with('update', 'Data Berhasil Di Update');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Tailed::class, 'slug_tailed', $request->nama_tailed);
        return response()->json(['slug_tailed' => $slug]);
    }

    function generateRandomString($length = 30)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
