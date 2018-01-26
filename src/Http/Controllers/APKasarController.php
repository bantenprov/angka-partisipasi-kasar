<?php namespace Bantenprov\PdrbHargaDasar\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\PdrbHargaDasar\Facades\PdrbHargaDasar;

/* Models */
use Bantenprov\PdrbHargaDasar\Models\Bantenprov\PdrbHargaDasar\PdrbHargaDasar as PdrbModel;
use Bantenprov\PdrbHargaDasar\Models\Bantenprov\PdrbHargaDasar\Province;
use Bantenprov\PdrbHargaDasar\Models\Bantenprov\PdrbHargaDasar\Regency;

/* etc */
use Validator;

/**
 * The PdrbHargaDasarController class.
 *
 * @package Bantenprov\PdrbHargaDasar
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PdrbHargaDasarController extends Controller
{

    protected $province;

    protected $regency;

    protected $ap_kasar;

    public function __construct(Regency $regency, Province $province, PdrbModel $ap_kasar)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->ap_kasar     = $ap_kasar;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $ap_kasar = $this->ap-kasar->find($id);

        return response()->json([
            'negara'    => $ap-kasar->negara,
            'province'  => $ap-kasar->getProvince->name,
            'regencies' => $ap-kasar->getRegency->name,
            'tahun'     => $ap-kasar->tahun,
            'data'      => $ap-kasar->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->ap-kasar->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->ap-kasar->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'PDRB '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

