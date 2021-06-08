<!DOCTYPE html>
<html lang="en">
<head>
    <title>USERS || Page</title>
    <!--------Tilte------------------->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--------Meta------------------->
    <link rel="stylesheet" href="../main.css/main-dash.css">
    <link rel="stylesheet" href='../Global.css/font-awesome.min.css'>
    <link rel="stylesheet" href="../Global.css/main.css">
    <link rel="stylesheet" href="../main.css/main-dash-media.css">
    <!--------Links------------------->
</head>
<body>
    <!---------HEADER || START--------->
        <header>
            <div class="logo">
                <h2>روسيا جيم</h2>
            </div>  <!----Logo---->

            <div class="search_inp">
                <input type="text" name="userSearch" id="userSearch" placeholder="البحث...">
                <i class="fa fa-search"></i>
            </div><!---- Search || Input ---->

            <div class="header_icons_contorls">
                <i class="fa fa-cog"></i>
                <i class="fa fa-bars"></i>
            </div><!----Header || Icons || Cotnrols ---->
            <a href="/logout"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
           
        </header>


        <form id="logout-form" action="/logout" method="post">  
            {{csrf_field()}}
             </form>
            
    <!---------HEADER || END--------->

    <!--------- TABLE || START --------->
    <div class="table">

        <div class="main_row active_color">
            <div>اسم المستخدم</div>
            <div>البريد الاكتروني</div>
            <div>رقم الهاتف</div>
            <div>تاريخ الدفع</div>
            <div>تاريخ الانتهتاء</div>
            <div>قيمه الاشتراك</div>
            <div class="main_row_contorls_icons">
                <i class="fa fa-print"></i>
                <i class="fa fa-plus"></i>
            </div>

        </div>


        <div class="main_row" id="dynamic-row">
        
          @foreach($subscribers as $subscriber)

                    <div class="table_cell">{{ $subscriber->name }}</div>
                    <div class="table_cell">{{ $subscriber->email }}</div>
                    <div class="table_cell">{{ $subscriber->mobile }}</div>
                    <div class="table_cell">{{ $subscriber->payment_date }}</div>
                    <div class="table_cell">{{ $subscriber->expire_date }}</div>
                    <div class="table_cell">{{ $subscriber->price }}</div>
                    <div class="table_cell">
                        <i class="fa fa-print"></i>
                        <i class="fa fa-repeat"></i>
                        <a href="/userdelete/{{$subscriber->id}}" class="fa fa-trash-o"></a>
                    </div>
                        

            @endforeach
          
        </div>



    </div>
 





            <!---- Main || Row || Control || Icons ---->

<!---- Mian || Row ---->
<!--====== STANDER || DATA ==========-->
   <!--  <div class="main_row">
                <div>اسم المستخدم</div>
                <div>البريد الاكتروني</div>
                <div>رقم الهاتف</div>
                <div>تاريخ الدفع</div>
                <div>تاريخ الانتهتاء</div>
                <div>قيمه الاشتراك</div>
                <div class="main_row_contorls_icons">
                    <i class="fa fa-print"></i>
                    <i class="fa fa-repeat"></i>
                    <i class="fa fa-trash-o"></i>
                </div>
        </div>  -->
<!--====== STANDER || DATA ==========-->
    </div>
    <!--------- TABLE || END --------->


    <!--------- TABLE ||SMALL || MEDIA || START --------->
    <div class="small_media_table">
        <div class="search_inp_2">
            <input type="text" placeholder="البحث...">
            <button><i class="fa fa-search"></i></button>
            <input type="submit" name="" id="" value="بحث">
        </div><!---- Search || Input ---->
    </div>
    <!--------- TABLE ||SMALL || MEDIA || END --------->

    <!--------- FORM ||SMALL || MEDIA || START --------->

  @foreach ($subscribers as $subscriber)

    <form class="get_data_form" id="editForm" method="post" action="/update-data/{{ $subscriber->id }}">
        {{ csrf_field() }}

        <span class="form_close">X</span>
        <h1>تعديل البينات</h1>
        
        <input type="text" name="id" value="{{ $subscriber->id }}">
        <input type="text" name="name" id="name"   value="{{ $subscriber->name }}">
        <input type="text" name="email"  value="{{ $subscriber->email }}">
        <input type="text" name="mobile" value="{{ $subscriber->mobile }}">
        <input type="date" name="p_date" value="{{ $subscriber->payment_date }}">
        <input type="date" name="e_date" value="{{ $subscriber->expire_date }}">
        <input type="text" name="price"  value="{{ $subscriber->price }}">
        <input type="submit" value="تعديل">
    </form>
  @endforeach  
       
  <form class="get_data_form_2">
        {{ csrf_field() }}

        <span class="form_close form_close_2">X</span>
        <h1>تعديل البينات</h1>
        <input type="text">
        <input type="text">
        <input type="text">
        <input type="text">
        <input type="date">
        <input type="date">
        <input type="text">
        <input type="submit" value="تعديل">
    </form>
   
    <!--------- FORM ||SMALL || MEDIA || END --------->

    <!--------- FORM ||BIG || MEDIA || START --------->
    <form class="set_data_form" action="/save-details" method="post">
        {{ csrf_field() }}

        <span class="form_close">X</span>
        <h1>ادخال البينات</h1>
        <input type="text" name="username" placeholder="اسم المشترك">
        <input type="text" name="email" placeholder="بريد المشترك">
        <input type="text" name="mobile" placeholder="رقم هاتف المشترك">
        <input type="date" name="p_date" placeholder="تاريخ الدفع">
        <input type="date" name="expire" placeholder="تاريخ الانتهاء">
        <input type="number" name="price" placeholder="قيمه الاشتراك">
        <input type="submit" value="اضافه">
    </form>
    <!--------- FORM ||BIG || MEDIA ||END --------->

    <!--------- MAIN || START --------->
    <main>
        <div class="users">
            <button>
                <i class="fa fa-users"></i>
            </button>
        </div><!---- Users ---->

        <div class="del_users">
            <button>
                <a href="/deleted-user/{{ $admins->id }}"><i class="fa fa-trash-o"></i></a>
            </button>
        </div><!---- Del || Users ---->
        
        <div class="users_data">
            <button>
                <a href="/data/{{ $admins->id }}"><i class="fa fa-pie-chart"></i></a>
            </button>
        </div><!---- Users || Data ---->
    </main>



    <!--------- MAIN || END --------->

    <!--------- COGS || BAR || START --------->
    <div class="cogs_bar">
        <span class="cogs_bar_close">X</span>
        <button><i class="fa fa-plus"></i></button>
    </div>
    <!--------- COGS || BAR || END --------->

    <!-----FOOTER || START---->
    <footer>
        <div class="reserve">
           Copyright © Al Deeb Company 2021 All Rights Reserved
        </div><!-----Reserve----->
    </footer>
    <!-----FOOTER || End---->

    <!--------SCRIPT || SRCS || START---------->




    <script src="../main.js/main-dash.js"></script>
   <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $('body').on('keyup','#userSearch',function(){
            var searchBox = $(this).val();

            $.ajax({
                method:'POST',
                url   :'{{ route("search-subscriber") }}',
                dataType : 'json',
                data : {
                    '_token' : '{{ csrf_token() }}',
                    searchBox : searchBox,
                    
                },
                success:function(res){
                    var divRow = '';
                    $('#dynamic-row').html('');
                    $.each(res , function(index , value){
                            divRow = '<div class="table_cell">'+value.name+'</div><div class="table_cell">'+value.email+'</div><div class="table_cell">'+value.mobile+'</div><div class="table_cell">'+value.payment_date+'</div><div class="table_cell">'+value.expire_date+'</div><div class="table_cell">'+value.price+'</div><div class="table_cell"><i class="fa fa-print"></i><i class="fa fa-repeat"></i><i class="fa fa-trash-o"></i> </div>';

                            $('#dynamic-row').append(divRow);


                    });
                },

            });
        });


    </script>

  

   
  



    <!--------SCRIPT || SRCS || END---------->

</body>
</html>
