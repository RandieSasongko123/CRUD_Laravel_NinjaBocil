<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\SkillResource;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\Services\SlugService;

class SkillController extends Controller
{
    // Menampilkan Seluruh Data
    public function index()
    {
        $skills = Skill::get();

        return SkillResource::collection($skills);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_skill' => 'required',
            'grade_skill' => 'required',
        ]);

        $image = null;

        if($request->fotoskill)
        {
            $filename = $this->generateRandomString();

            $extension = $request->fotoskill->extension();

            $image = $filename.'.'.$extension;

            Storage::putFileAs('public/image', $request->fotoskill, $image);
        }

        $request['user_id'] = Auth::user()->id;

        $user_id = Auth::user()->id;

        $skill = Skill::create([
            'fotoskill' => $image,
            'nama_skill' => $request->nama_skill,
            'slug_skill' => $request->slug_skill,
            'grade_skill' => $request->grade_skill,
            'damage_skill' => $request->damage_skill,
            'chakra_skill' => $request->chakra_skill,
            'proc_rate_skill' => $request->proc_rate_skill,
            'effect_skill' => $request->effect_skill,
            'launch_skill' => $request->launch_skill,
            'restriction_skill' => $request->restriction_skill,
            'round_skill' => $request->round_skill,
            'kartegori' => $request->kartegori,
            'tier_skill' => $request->tier_skill,
            'user_id' => $user_id
        ]);

        // $skill = Skill::create($request->all());

        return new SkillResource($skill);
    }

    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return new SkillResource($skill->all);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Skill::class, 'slug_skill', $request->nama_skill);
        return response()->json(['slug_skill' => $slug]);
    }

    public function tambahView()
    {
        return view('Skill.create');
    }

    public function tambah(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'fotoskill' => 'image',
            'nama_skill' => 'required',
            'grade_skill' => 'required',
        ]);

        $image = null;

        if($request->fotoskill)
        {
            $filename = $this->generateRandomString();

            $extension = $request->fotoskill->extension();

            $image = $filename.'.'.$extension;

            Storage::putFileAs('public/image', $request->fotoskill, $image);
        }

        $skill = Skill::create([
            'fotoskill' => $image,
            'nama_skill' => $request->nama_skill,
            'slug_skill' => $request->slug_skill,
            'grade_skill' => $request->grade_skill,
            'damage_skill' => $request->damage_skill,
            'chakra_skill' => $request->chakra_skill,
            'proc_rate_skill' => $request->proc_rate_skill,
            'effect_skill' => $request->effect_skill,
            'launch_skill' => $request->launch_skill,
            'restriction_skill' => $request->restriction_skill,
            'round_skill' => $request->round_skill,
            'kartegori' => $request->kartegori,
            'tier_skill' => $request->tier_skill,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('Skill.dashboard')->with('create', 'Data Berhasil Di Buat');
    }

    public function dashboard()
    {
        $data = Skill::all();
        return view('Skill.dashboard', ['data' => $data]);
    }

    public function tampilkandata($id)
    {
        $skill = Skill::findOrFail($id);
        // dd($karakter);

        return view('Skill.update', compact('skill'));
    }

    public function updatedata(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);

        $validated = $request->validate([
            'fotoskill' => 'image',
            'nama_skill' => 'required',
            'grade_skill' => 'required',
        ]);

        $image = $skill->fotoskill;

        if ($request->hasFile('fotoskill')) {
            $filename = $this->generateRandomString();
            $extension = $request->fotoskill->extension();
            $image = $filename.'.'.$extension;
            Storage::putFileAs('public/image', $request->file('fotoskill'), $image);
        }

        $skill->update([
            'fotoskill' => $image,
            'nama_skill' => $request->nama_skill,
            'slug_skill' => $request->slug_skill,
            'grade_skill' => $request->grade_skill,
            'damage_skill' => $request->damage_skill,
            'chakra_skill' => $request->chakra_skill,
            'proc_rate_skill' => $request->proc_rate_skill,
            'effect_skill' => $request->effect_skill,
            'launch_skill' => $request->launch_skill,
            'restriction_skill' => $request->restriction_skill,
            'round_skill' => $request->round_skill,
            'kartegori' => $request->kartegori,
            'tier_skill' => $request->tier_skill,
        ]);

        return redirect()->route('Skill.dashboard')->with('update', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect()->route('Skill.dashboard')->with('delete', 'Data Berhasil Di Hapus');
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
