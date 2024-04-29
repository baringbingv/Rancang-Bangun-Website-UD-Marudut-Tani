<?php

namespace App\Http\Controllers\Kasir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonial = Testimonial::paginate(5);
        return view('kasir.testimonial.indexTestimonial', compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kasir.testimonial.tambahTestimonial');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = [
            'nama' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'deskripsi' => 'required',
            'email' => 'required|email',
        ];

        $message = [
            'nama.required' => 'Kolom Nama Harus Di isi',
            'nama.max' => 'Testimonial tidak boleh lebih dari 255 karakter',
            'nama.regex' => 'Isi Kolom Nama Harus Berupa Huruf/String',
            'foto.mimes' => 'Foto harus berformat jpeg, png, dan jpg',
            'foto.max' => 'Foto tidak boleh lebih dari 5MB',
            'deskripsi.required' => 'Kolom Deskripsi Harus Di isi',
            'email.required' => 'Kolom E-Mail Harus Di isi',
            'email.required' => 'Kolom Harus Bertipe E-Mail',
        ];
        $this->validate($request, $validate, $message);

        $file = $request -> file('foto');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'testimonial';

        $file->move($tujuanFile,$namaFile);

        $newTestimonial = new Testimonial;
        $newTestimonial->nama = $request->nama;
        $newTestimonial->foto = $namaFile;
        $newTestimonial->deskripsi = $request->deskripsi;
        $newTestimonial->email = $request->email;

        $newTestimonial->save();
        return redirect("/kasir/testimonial")->with ('status', 'Testimonial ' .$newTestimonial->testimonial. ' berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonial = Testimonial::find($id);
        return view('kasir.testimonial.viewTestimonial', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('kasir.testimonial.editTestimonial', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $validate = [
            'nama' => 'required|regex:/^[\pL\s\-]+$/u',
            'deskripsi' => 'required',
            'email' => 'required|email',
        ];

        $message = [
            'nama.required' => 'Kolom Nama Harus Di isi',
            'nama.max' => 'Testimonial tidak boleh lebih dari 255 karakter',
            'nama.regex' => 'Isi Kolom Nama Harus Berupa Huruf/String',
            'deskripsi.required' => 'Kolom Deskripsi Harus Di isi',
            'email.required' => 'Kolom E-Mail Harus Di isi',
            'email.required' => 'Kolom Harus Bertipe E-Mail',
        ];

        $testimonial = Testimonial::find($id);
        $testimonial->nama = $request['nama'];
        $testimonial->deskripsi = $request['deskripsi'];
        $testimonial->email = $request['email'];

        $testimonial->update();
        return redirect('/kasir/testimonial')->with('status', 'Testimonial ' . $testimonial->nama . ' Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->delete();
        return redirect('/kasir/testimonial')->with('success_message', 'Testimonial ' . $testimonial->nama . ' berhasil dihapus');
    }
}
