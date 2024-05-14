<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Topup;

use App\Models\Paket;

use Illuminate\Http\RedirectResponse;

use Illuminate\View\View;

use Illuminate\Support\Facades\Storage;

class TopupController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get artikels
        $pakets = Topup::latest()->paginate(5);

        //render view with artikels
        return view('pakets.index', compact('pakets'));
    }

    public function create(): View
    {
        return view('pakets.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'gambar'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama'     => 'required|min:5',
            'paket'   => 'required|min:5',
            'harga'   => 'required|min:5'
        ]);

        //upload image
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/pakets', $gambar->hashName());

        //create artikel
        Topup::create([
            'gambar'     => $gambar->hashName(),
            'nama'     => $request->nama,
            'paket'   => $request->paket,
            'harga'   => $request->harga,
        ]);

        //redirect to index
        return redirect()->route('pakets.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        //get artikel by ID
        $pakets = Topup::findOrFail($id);

        //render view with artikel
        return view('pakets.show', compact('pakets'));
    }

    public function edit(string $id): View
    {
        //get artikel by ID
        $pakets = Topup::findOrFail($id);

        //render view with artikel
        return view('pakets.edit', compact('pakets'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'gambar'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'nama'     => 'required|min:5',
            'paket'   => 'required|min:5',
            'harga'   => 'required|min:5'
        ]);

        //get artikel by ID
        $pakets = Topup::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('gambar')) {

            //upload new image
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/artikels', $gambar->hashName());

            //delete old image
            Storage::delete('public/artikels/' . $pakets->gambar);

            //update post with new image
            $pakets->update([
                'gambar'     => $gambar->hashName(),
                'nama'     => $request->nama,
                'paket'     => $request->paket,
                'harga'   => $request->harga
            ]);
        } else {

            //update artikel without image
            $pakets->update([
                'nama'     => $request->nama,
                'paket'     => $request->paket,
                'harga'   => $request->harga
            ]);
        }

        //redirect to index
        return redirect()->route('pakets.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $pakets = Topup::findOrFail($id);

        //delete image
        Storage::delete('public/pakets/' . $pakets->gambar);

        //delete post
        $pakets->delete();

        //redirect to index
        return redirect()->route('pakets.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}