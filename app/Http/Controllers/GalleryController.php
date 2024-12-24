<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;

session_start();
class GalleryController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Auth::id();
        if ($admin_id) {
            return Redirect::to("/dashboard");
        } else {
            return Redirect::to("/admin")->send();
        }
    }
    public function add_gallery($product_id)
    {
        $pro_id = $product_id;
        return view("admin.gallery.add_gallery")->with(compact("pro_id"));
    }
    public function insert_gallery(Request $request, $pro_id)
    {
        $get_image = $request->file("file");
        if ($get_image) {
            foreach ($get_image as $image) {
                $get_name_image = $image->getClientOriginalName();
                $name_imgae = current(explode(".", $get_name_image));
                $new_image = $name_imgae . rand(0, 99) . "." . $image->getClientOriginalExtension();
                $image->move("public/uploads/gallery", $new_image);
                $gallery = new Gallery();
                $gallery->gallery_name = $new_image;
                $gallery->gallery_image = $new_image;
                $gallery->product_id = $pro_id;
                $gallery->save();
            }
        }
        Session::put("message", "Add Gallery Successfully");
        return redirect()->back();
    }
    public function select_gallery(Request $request)
    {
        $product_id = $request->pro_id;
        $gallery = Gallery::where("product_id", $product_id)->get();
        $gallery_count = $gallery->count();
        $output =  '
         <form>
         ' . csrf_field() . '
          <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Gallery ID</th>
                                    <th>Image Name</th>
                                    <th>Image</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>';
        if ($gallery_count > 0) {
            $i = 0;
            foreach ($gallery as $key => $gal) {
                $i++;
                $output .= '
                                    <tr class="gradeX">
                                    <td>' . $i . '</td>
                                    <td contenteditable class="edit_gal_name" data-gal_id="' . $gal->gallery_id . '">
                                    ' . $gal->gallery_name . '
                                    </td>
                                    <td>
                                        <img src="' . url('public/uploads/gallery/' . $gal->gallery_image) . '" style="width: 150px; height: auto ;"> <br>
                                        <input type="file" id="file-' . $gal->gallery_id . '" class="form-control file_image" name="file" accept="image/*" data-gal_id="' . $gal->gallery_id . '" style="width:30% ; margin-top:10px">
                                    </td>
                                    <td class="center"> 
                                        <span>
                                                <button type="button" data-gal_id="' . $gal->gallery_id . '" class="buttonOptions delete-gallery" style="background-color: transparent;  border: none">
                                                    <a href="">
                                                        Delete
                                                    </a>
                                                </button>
                                        </span>
                                        <br>
                                    </td>
                                </tr>';
            }
        } else {
            $output .= '<tr class="gradeX">
                            <td colspan="4">No data found</td>
                        </tr>';
        }
        $output .= '</tbody>
                        <tfoot>
                            <tr>
                                <th>Gallery ID</th>
                                <th>Image Name</th>
                                <th>Image</th>
                                <th>Options</th>
                            </tr>
                        </tfoot>
                        </table>
                         </form>';
        echo $output;
    }
    public function update_gallery_name(Request $request)
    {
        $gallery_id = $request->gal_id;
        $gallery_text = $request->gal_text;
        $gallery = Gallery::find($gallery_id);
        $gallery->gallery_name = $gallery_text;
        $gallery->save();
    }
    public function delete_gallery(Request $request)
    {
        $gallery_id = $request->gal_id;
        $gallery = Gallery::find($gallery_id);
        unlink("public/uploads/gallery/" . $gallery->gallery_image);
        $gallery->delete();
    }
    public function update_gallery(Request $request)
    {
        $get_image = $request->file("file");
        $gal_id = $request->gal_id;
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_imgae = current(explode(".", $get_name_image));
            $new_image = $name_imgae . rand(0, 99) . "." . $get_image->getClientOriginalExtension();
            $get_image->move("public/uploads/gallery", $new_image);
            $gallery =  Gallery::find($gal_id);
            unlink("public/uploads/gallery/" . $gallery->gallery_image);
            $gallery->gallery_image = $new_image;
            $gallery->save();
        }
    }
}
