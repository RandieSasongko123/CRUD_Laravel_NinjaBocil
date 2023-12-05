<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Karakter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\KarakterResource;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\Services\SlugService;

class KarakterController extends Controller
{
    public function index()
    {
        $karakters = Karakter::with(
            'karakter_skill_1:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_2:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_3:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_4:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_5:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_6:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_7:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_8:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_9:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_10:id,fotoskill,nama_skill,grade_skill,kartegori',
        )->get();

        return KarakterResource::collection($karakters);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'skill_1_karakter' => 'required|exists:skills,id',
            'skill_2_karakter' => 'required|exists:skills,id',
            'skill_3_karakter' => 'required|exists:skills,id',
            'skill_4_karakter' => 'required|exists:skills,id',
            'skill_5_karakter' => 'required|exists:skills,id',
            'skill_6_karakter' => 'required|exists:skills,id',
            'skill_7_karakter' => 'required|exists:skills,id',
            'skill_8_karakter' => 'required|exists:skills,id',
            'skill_9_karakter' => 'required|exists:skills,id',
            'skill_10_karakter' => 'required|exists:skills,id',
            'foto_karakter' => 'required',
            'nama_karakter' => 'required',
            'grade_karakter' => 'required',
            'chakra_karakter' => 'required',
            'tier_karakter' => 'required'
        ]);

        $image1 = null;

        if($request->foto_karakter)
        {
            $filename1 = $this->generateRandomString();

            $extension1 = $request->foto_karakter->extension();

            $image1 = $filename1.'.'.$extension1;

            Storage::putFileAs('public/image', $request->file('foto_karakter'), $image1);
        }

        $image2 = null;

        if($request->background)
        {
            $filename2 = $this->generateRandomString();

            $extension2 = $request->background->extension();

            $image2 = $filename2.'.'.$extension2;

            Storage::putFileAs('public/image', $request->file('background'), $image2);
        }

        $request['user_id'] = Auth::user()->id;

        $user_id = Auth::user()->id;

        $karakter = Karakter::create([
            'foto_karakter' => $image1,
            'background' => $image2,
            'nama_karakter' => $request->nama_karakter,
            'slug_karakter' => $request->slug_karakter,
            'grade_karakter' => $request->grade_karakter,
            'quality_karakter' => $request->quality_karakter,
            'chakra_karakter' => $request->chakra_karakter,
            'tier_karakter' => $request->tier_karakter,
            'skill_1_karakter' => $request->skill_1_karakter,
            'skill_2_karakter' => $request->skill_2_karakter,
            'skill_3_karakter' => $request->skill_3_karakter,
            'skill_4_karakter' => $request->skill_4_karakter,
            'skill_5_karakter' => $request->skill_5_karakter,
            'skill_6_karakter' => $request->skill_6_karakter,
            'skill_7_karakter' => $request->skill_7_karakter,
            'skill_8_karakter' => $request->skill_8_karakter,
            'skill_9_karakter' => $request->skill_9_karakter,
            'skill_10_karakter' => $request->skill_10_karakter,
            'user_id' => $user_id
        ]);

        return new KarakterResource($karakter->loadMissing([
            'karakter_skill_1:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_2:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_3:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_4:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_5:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_6:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_7:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_8:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_9:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_10:id,fotoskill,nama_skill,grade_skill,kartegori'
        ]));

    }

    public function destroy($id)
    {
        $karakter = Karakter::findOrFail($id);
        $karakter->delete();

        return new KarakterResource($karakter->loadMissing(
            'karakter_skill_1:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_2:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_3:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_4:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_5:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_6:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_7:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_8:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_9:id,fotoskill,nama_skill,grade_skill,kartegori',
            'karakter_skill_10:id,fotoskill,nama_skill,grade_skill,kartegori'
        ));
    }

    // Direct Ke View

    public function tambahView()
    {
        $data = Skill::all();
        return view('Karakter.create', ['data' => $data]);
    }

    public function delete($id)
    {
        $karakter = Karakter::findOrFail($id);
        $karakter->delete();

        return redirect()->route('Karakter.dashboard')->with('delete', 'Data Berhasil Di Hapus');
    }

    public function dashboard()
    {
        $data = Karakter::all();
        return view('Karakter.dashboard', ['data' => $data]);
    }

    public function tambah(Request $request)
    {

        $validated = $request->validate([
            'skill_1_karakter' => 'required|exists:skills,id',
            'skill_2_karakter' => 'required|exists:skills,id',
            'skill_3_karakter' => 'required|exists:skills,id',
            'skill_4_karakter' => 'required|exists:skills,id',
            'skill_5_karakter' => 'required|exists:skills,id',
            'skill_6_karakter' => 'required|exists:skills,id',
            'skill_7_karakter' => 'required|exists:skills,id',
            'skill_8_karakter' => 'required|exists:skills,id',
            'skill_9_karakter' => 'required|exists:skills,id',
            'skill_10_karakter' => 'required|exists:skills,id',
            'foto_karakter' => 'required',
            'nama_karakter' => 'required',
            'grade_karakter' => 'required',
            'chakra_karakter' => 'required',
            'tier_karakter' => 'required',
            'foto_karakter' => 'image'
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $image1 = null;

        if($request->foto_karakter)
        {
            $filename1 = $this->generateRandomString();

            $extension1 = $request->foto_karakter->extension();

            $image1 = $filename1.'.'.$extension1;

            Storage::putFileAs('public/image', $request->file('foto_karakter'), $image1);
        }

        $image2 = null;

        if($request->background)
        {
            $filename2 = $this->generateRandomString();

            $extension2 = $request->background->extension();

            $image2 = $filename2.'.'.$extension2;

            Storage::putFileAs('public/image', $request->file('background'), $image2);
        }

        $karakter = Karakter::create([
            'user_id' => Auth::user()->id,
            'foto_karakter' => $image1,
            'background' => $image2,
            'nama_karakter' => $request->nama_karakter,
            'slug_karakter' => $request->slug_karakter,
            'grade_karakter' => $request->grade_karakter,
            'quality_karakter' => $request->quality_karakter,
            'chakra_karakter' => $request->chakra_karakter,
            'tier_karakter' => $request->tier_karakter,
            'skill_1_karakter' => $request->skill_1_karakter,
            'skill_2_karakter' => $request->skill_2_karakter,
            'skill_3_karakter' => $request->skill_3_karakter,
            'skill_4_karakter' => $request->skill_4_karakter,
            'skill_5_karakter' => $request->skill_5_karakter,
            'skill_6_karakter' => $request->skill_6_karakter,
            'skill_7_karakter' => $request->skill_7_karakter,
            'skill_8_karakter' => $request->skill_8_karakter,
            'skill_9_karakter' => $request->skill_9_karakter,
            'skill_10_karakter' => $request->skill_10_karakter
        ]);

        return redirect()->route('Karakter.dashboard')->with('create', 'Data Berhasil Di Buat');

    }

    public function tampilkandata($id)
    {
        $karakter = Karakter::with(
            'skill_1_karakter:id,fotoskill,nama_skill,grade_skill,kartegori',
            'skill_2_karakter:id,fotoskill,nama_skill,grade_skill,kartegori',
            'skill_3_karakter:id,fotoskill,nama_skill,grade_skill,kartegori',
            'skill_4_karakter:id,fotoskill,nama_skill,grade_skill,kartegori',
            'skill_5_karakter:id,fotoskill,nama_skill,grade_skill,kartegori',
            'skill_6_karakter:id,fotoskill,nama_skill,grade_skill,kartegori',
            'skill_7_karakter:id,fotoskill,nama_skill,grade_skill,kartegori',
            'skill_8_karakter:id,fotoskill,nama_skill,grade_skill,kartegori',
            'skill_9_karakter:id,fotoskill,nama_skill,grade_skill,kartegori',
            'skill_10_karakter:id,fotoskill,nama_skill,grade_skill,kartegori',
        )->findOrFail($id);

        $data = Skill::all();
        // dd($karakter);

        return view('Karakter.update', compact('karakter', 'data'));
    }

    public function updatedata(Request $request, $id)
    {
        $karakter = Karakter::findOrFail($id);

        $validated = $request->validate([
            'skill_1_karakter' => 'required|exists:skills,id',
            'skill_2_karakter' => 'required|exists:skills,id',
            'skill_3_karakter' => 'required|exists:skills,id',
            'skill_4_karakter' => 'required|exists:skills,id',
            'skill_5_karakter' => 'required|exists:skills,id',
            'skill_6_karakter' => 'required|exists:skills,id',
            'skill_7_karakter' => 'required|exists:skills,id',
            'skill_8_karakter' => 'required|exists:skills,id',
            'skill_9_karakter' => 'required|exists:skills,id',
            'skill_10_karakter' => 'required|exists:skills,id',
            'foto_karakter' => 'required',
            'nama_karakter' => 'required',
            'grade_karakter' => 'required',
            'chakra_karakter' => 'required',
            'tier_karakter' => 'required',
            'foto_karakter' => 'image'
        ]);

        $image1 = $karakter->foto_karakter;

        if ($request->hasFile('foto_karakter')) {
            $filename1 = $this->generateRandomString();
            $extension1 = $request->foto_karakter->extension();
            $image1 = $filename1.'.'.$extension1;
            Storage::putFileAs('public/image', $request->file('foto_karakter'), $image1);
        }

        $image2 = $karakter->background;

        if ($request->hasFile('background')) {
            $filename2 = $this->generateRandomString();
            $extension2 = $request->background->extension();
            $image2 = $filename2.'.'.$extension2;
            Storage::putFileAs('public/image', $request->file('background'), $image2);
        }

        $karakter->update([
            'foto_karakter' => $image1,
            'background' => $image2,
            'nama_karakter' => $request->nama_karakter,
            'slug_karakter' => $request->slug_karakter,
            'grade_karakter' => $request->grade_karakter,
            'quality_karakter' => $request->quality_karakter,
            'chakra_karakter' => $request->chakra_karakter,
            'tier_karakter' => $request->tier_karakter,
            'skill_1_karakter' => $request->skill_1_karakter,
            'skill_2_karakter' => $request->skill_2_karakter,
            'skill_3_karakter' => $request->skill_3_karakter,
            'skill_4_karakter' => $request->skill_4_karakter,
            'skill_5_karakter' => $request->skill_5_karakter,
            'skill_6_karakter' => $request->skill_6_karakter,
            'skill_7_karakter' => $request->skill_7_karakter,
            'skill_8_karakter' => $request->skill_8_karakter,
            'skill_9_karakter' => $request->skill_9_karakter,
            'skill_10_karakter' => $request->skill_10_karakter
        ]);

        return redirect()->route('Karakter.dashboard')->with('update', 'Data Berhasil Di Update');
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

    public function checkSlug(Request $request)
    {
        //
        $slug = SlugService::createSlug(Karakter::class, 'slug_karakter', $request->nama_karakter);
        return response()->json(['slug_karakter' => $slug]);
    }

}
