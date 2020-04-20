@extends('layout.Panel.temp')
@section('content')
 <div class="address-page">
    <h4>پنل کاربری</h4>
    <p>لیست کاربران</p>
</div>
<div class="container-fluid panel-table">
    <div class="head-panel">
        <h4> لیست کاربران</h4>
    </div>
    <div class="col-md-12 ">
        <div class="table-responsive">
            <table class="table table-bordered table-primary " id="DataTable">
                        <thead>
                        <tr>
                            <th scope="col">ردیف</th>
                            <th scope="col"> نام و نام خانوادگی </th>
                            <th scope="col"> شماره موبایل  </th>
                            <th scope="col"> شناسه ملی </th>
                            <th scope="col">ادرس ایمیل </th>
                            <th scope="col">جزئیات</th>
                            <th scope="col">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                       
                        
                        @foreach ($users as $key =>$applicant)
                        <tr>
                            <th>{{$key +1}}</th>
                            <th> {{$applicant->applicant_fullname}} </th>
                            <th>{{$applicant->applicant_mobile}}</th>
                            <th>{{$applicant->publicData->applicant_national_code}}</th>
                            <th>{{$applicant->applicant_email}}  </th>
                            <th><a href="  " class="btn btn-info btn-sm" >نمایش</a></th>
                            <th>
                            <form action="" method="POST" data-name="{{$applicant->applicant_fullname}}" data-id="{{$applicant->applicant_id}}">
                                @method('delete')
                                @csrf
                                <input type="hidden" name="hidden" id="hidden" value="{{$applicant->applicant_id}}">
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" >حذف</a>
                                </form>
                            </th>
                        </tr>

                        @endforeach
                       
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    


<!-- Delete Popup -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body mt-5">
                <p class="modal__text text-center"></p>
            </div>
            <div class="modal-footer mx-auto">
                <button type="button" class="btn btn-outline-secondary mb-3 mr-3 mx-3" data-dismiss="modal">خیر</button>
                <button id="hazf" type="button" class="btn btn-danger mb-3">بله حذف شود!</button>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function () {

        $('#deleteModal').on('shown.bs.modal', function(e) {
            e.preventDefault()
            var $invoker = $(e.relatedTarget);
            id = $invoker.parents('form').attr('data-id'); 
            name =  $invoker.parents('form').attr('data-name');
            $('.modal__text').text(name + ' از لیست متقاضیان حذف شود؟ ')
        });

        $('#hazf').click(function(e){
            var form = $('form[data-id='+id+']')
            form.submit()
        })
    });
</script>
@endsection


@section('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {box-shadow: none;border: none;}
    .dataTables_wrapper .dataTables_paginate .paginate_button {padding:0;}
    .edit__profile__left{
       margin-top:50px;
     }
     .fa__links{
        font-size: 20px;
    background: blue;
    color: white;
    padding: 5px;
    border-radius: 5px;
     }
     .fa-instagram{
        background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);

     }

     .fa-telegram{
         background: #285AEB;
     }

     .fa-whatsapp{
        background: #075e54;
     }

     .fa-linkedin{
         background: gray;
     }
     @media (min-width: 992px){
.modal-lg {
    width: 1000px !important;
}
     }

 .badge{
    background-color: #74a1d0 !important;
 }    
 #deleteModal .modal-header {
background-color: #dc3545;
height: 6rem;
}
#deleteModal .modal-header:after {
font-family: "Material Icons";
content: '\e645';
font-weight: 600;
color: #fff;
background-color: #ff959f;
font-size: 3rem;
text-align: center;
padding: 0;
width: 7rem;
height: 7rem;
line-height: 7rem;
border-radius: 50%;
margin: 0.4em auto 0 auto;
animation: zoomIt 0.3s;
}
#deleteModal .modal-body h2 {
color: #dc3545;
}
#deleteModal .modal-footer {
border: 0;
}
    </style>
@endsection
