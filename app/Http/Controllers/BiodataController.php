<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BiodataController extends Controller
{
    private function rules(?int $id = null): array
    {
        return [
            'nama_lengkap'        => 'required|string|max:100',
            'jabatan'             => 'nullable|string|max:100',
            'email'               => ['required', 'email', Rule::unique((new Biodata)->getTable(), 'email')->ignore($id)],
            'no_hp'               => 'nullable|string|max:20',
            'tempat_lahir'        => 'nullable|string|max:100',
            'tanggal_lahir'       => 'nullable|date',
            'jenis_kelamin'       => 'nullable|in:Laki-laki,Perempuan',
            'status'              => 'nullable|in:Belum menikah,Menikah',
            'kewarganegaraan'     => 'nullable|string|max:50',
            'alamat'              => 'nullable|string|max:255',
            'sosial_media'        => 'nullable|string|max:100',
            'pendidikan'          => 'nullable|string',
            'keahlian'            => 'nullable|string|max:255',
            'pengalaman'          => 'nullable|string',
            'tentang_saya'        => 'nullable|string',
            'foto'                => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    // Simpan foto ke public/foto, kembalikan nama file
    private function simpanFoto(Request $request): ?string
    {
        if (! $request->hasFile('foto')) {
            return null;
        }
        $file = $request->file('foto');
        $nama = uniqid('foto_') . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('foto'), $nama);

        return $nama;
    }

    private function hapusFoto(?string $nama): void
    {
        if ($nama && file_exists(public_path('foto/' . $nama))) {
            @unlink(public_path('foto/' . $nama));
        }
    }

    public function index()
    {
        $dataBiodata = Biodata::latest()->get();
        return view('biodata.index', compact('dataBiodata'));
    }

    public function create()
    {
        return view('biodata.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['foto'] = $this->simpanFoto($request);
        Biodata::create($data);

        return redirect()->route('biodata.index')->with('success', 'Biodata berhasil ditambahkan!');
    }

    public function show(Biodata $biodata)
    {
        return view('biodata.show', compact('biodata'));
    }

    public function edit(Biodata $biodata)
    {
        return view('biodata.edit', compact('biodata'));
    }

    public function update(Request $request, Biodata $biodata)
    {
        $data = $request->validate($this->rules($biodata->id));
        unset($data['foto']);

        if ($request->hasFile('foto')) {
            $this->hapusFoto($biodata->foto);
            $data['foto'] = $this->simpanFoto($request);
        } elseif ($request->boolean('hapus_foto')) {
            $this->hapusFoto($biodata->foto);
            $data['foto'] = null;
        }

        $biodata->update($data);

        return redirect()->route('biodata.index')->with('success', 'Biodata berhasil diperbarui!');
    }

    public function destroy(Biodata $biodata)
    {
        $this->hapusFoto($biodata->foto);
        $biodata->delete();

        return redirect()->route('biodata.index')->with('success', 'Biodata berhasil dihapus!');
    }
}
