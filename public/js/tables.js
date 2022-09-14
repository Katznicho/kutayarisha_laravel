$(function() {

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        // pageLength:20,
        // scrollX:true,
        ajax: "{{ route('patients.index') }}",
        columns: [

            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'names',
                name: 'names'
            },



            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },

        ]
    })

    //show article
    //show artice

});
