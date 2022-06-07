<!-- Форма - фильтр поиска пациентов по операции, по врачу -->

<!-- Content Wrapper. Contains page content -->
   <!-- Content Header (Page header) -->
   <div class="row pt-0" >
       <h4 class=" ml-2 mt-0 text-dark">Форма праці з напрямками</h3>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <div class="dropdown">
                  <a class="dropdown-toggle" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> Фільтр </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="{{route('filter', [$id='activ'])}}">По активному користувачу</a></li>
                    <li><a class="dropdown-item" href="{{route('filter', [$id='dposplan'])}}">Чекає на госпіталізацію</a></li>
                    <li><a class="dropdown-item" href="{{route('filter', [$id='all'])}}">Усі напрямки</a></li>
                  </ul>
                </div>
              </li>

             <li class="breadcrumb-item active"><a class="mt-1  ml-2 " href="{{route('searchuser')}}" > <i class="bi bi-person-plus "> Створити напрямок</i></a>  <!--<i class="bi bi-window-dock"></i>>--></li>
            </ol>
        </div><!-- /.col -->
          <!--<img src="{{asset('/picture/about-img.svg')}}" class="img-fluid" alt="">-->
          <!--features.png вариант картинки-->
</div>
<!-- Button trigger modal -->