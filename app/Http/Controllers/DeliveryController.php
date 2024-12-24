<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Ward;
use App\Models\Feeship;

class DeliveryController extends Controller
{
    public function delivery()
    {
        $city = City::orderBy('matp', 'ASC')->get();
        return view('admin.delivery.add_delivery')->with(compact('city'));
    }
    public function select_delivery(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == 'city') {
                $select_province = Province::where('ma_city', $data['ma_id'])->orderBy('maqh', 'ASC')->get();
                $output .= '<option value="">Select District</option>';
                foreach ($select_province as $key => $province) {
                    $output .= '<option value="' . $province->maqh . '">' . $province->name_district . '</option>';
                }
            } else {
                $select_wards = Ward::where('ma_district', $data['ma_id'])->orderBy('xaid', 'ASC')->get();
                $output .= '<option value="">Select Ward</option>';
                foreach ($select_wards as $key => $ward) {
                    $output .= '<option value="' . $ward->xaid . '">' . $ward->name_ward . '</option>';
                }
            }
        }
        echo $output;
    }
    public function insert_delivery(Request $request)
    {
        $data = $request->all();
        $feeship = new Feeship();
        $feeship->fee_city_id = $data['city'];
        $feeship->fee_district_id = $data['district'];
        $feeship->fee_ward_id = $data['ward'];
        $feeship->fee_feeship = $data['fee_ship'];
        $feeship->save();
        return redirect()->back()->with('message', 'Add Delivery Success');
    }
    public function select_feeship()
    {
        $feeship = Feeship::orderby('fee_id', 'DESC')->get();
        $output = '';
        $output .= ' <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                    <tr>
                        <th>City</th>
                        <th>District</th>
                        <th>Ward</th>
                        <th>Feeship</th>
                    </tr>
                </thead>
                <tbody>';
        foreach ($feeship as $key => $fee) {
            $output .=  '<tr class="gradeX">
                         <td>
                            ' . $fee->city->name_city . '
                         </td>
                        <td>
                            ' . $fee->district->name_district . '
                        </td>
                        <td>
                            ' . $fee->ward->name_ward . '
                        </td>
                        <td contenteditable class="fee_feeship_edit" data-feeship_id="' . $fee->fee_id . '">
                            ' . number_format($fee->fee_feeship) . '$' . '
                        </td>
                        </tr>';
        }
        $output  .= '</tbody>
            </table>
        ';
        echo $output;
    }
    public function update_delivery(Request $request)
    {
        $data = $request->all();
        $feeship =  Feeship::find($data['feeship_id']);
        $fee_value = rtrim($data['fee_value'], '$');
        $feeship->fee_feeship = $fee_value;
        $feeship->save();
    }
}
