<?php



namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Contact;

use DataTables;

use Alert;



class ContactController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

     public function index(Request $request)
        {
            
            $data = Contact::latest();
        
              $fromDate=$request->start_date;
              $toDate=$request->end_date;
        
if ($fromDate && $toDate) {
    // Convert the provided dates to the database format "Y-m-d"
    $fromDateDbFormat = date('Y-m-d', strtotime($fromDate));
    $toDateDbFormat = date('Y-m-d', strtotime($toDate));

    if ($fromDateDbFormat === $toDateDbFormat) {
        $data->whereDate('created_at', '=', $fromDateDbFormat);
    } else {
        // Use the BETWEEN condition for different start and end dates
        $data->whereDate('created_at', '>=', $fromDateDbFormat)
             ->whereDate('created_at', '<=', $toDateDbFormat);
    }
} else {
    // If only "From Start Date" is provided
    if ($fromDate) {
        // Convert the provided date to the database format "Y-m-d"
        $fromDateDbFormat = date('Y-m-d', strtotime($fromDate));
        $data->whereDate('created_at', '=', $fromDateDbFormat);
    }
    // If only "To End Date" is provided
    if ($toDate) {
        // Convert the provided date to the database format "Y-m-d"
        $toDateDbFormat = date('Y-m-d', strtotime($toDate));
        $data->whereDate('created_at', '=', $toDateDbFormat);
    }
}

        
        
            // Filter by search_text
            if ($request->filled('search_text')) {
                $search_text = $request->search_text;
        
                $data->where('full_name', 'like', "%$search_text%");
            }
        
            // If 'export' parameter is present, export the data as CSV
            if ($request->filled('export')) {
                $fileName = 'contact.csv';
                $headers = [
                    "Content-type" => "text/csv",
                    "Content-Disposition" => "attachment; filename=$fileName",
                    "Pragma" => "no-cache",
                    "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                    "Expires" => "0"
                ];
        
                $data = $data->get();
        
                $columns = ['Full Name', 'Email', 'Mobile', 'Message', 'Date'];
        
                $callback = function () use ($data, $columns) {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns);
        
                    foreach ($data as $datas) {
                        $row['Full Name'] = $datas->full_name;
                        $row['Email'] = $datas->email;
                        $row['Mobile'] = $datas->phone_number;
                        $row['Message'] = $datas->message;
                        $row['Date'] = date('Y-m-d', strtotime($datas->created_at));
        
                        fputcsv($file, array_values($row));
                    }
                    fclose($file);
                };
        
                return response()->stream($callback, 200, $headers);
            }
        
            // Load the filtered data for display
            $data = $data->paginate(10);
        
            return view('Admin.contact.view', ["cont_arr" => $data,
                "start_date" => $request->input('start_date', ''),
                  "end_date" => $request->input('end_date', ''),
                   "search_text" => $request->input('search_text', ''),
                ]);
        }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        //

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        //

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        //

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        //

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        //

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        //

    }

}

