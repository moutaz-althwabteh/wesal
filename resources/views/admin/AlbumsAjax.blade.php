<?php use Carbon\Carbon; ?>
         <table id="data"  class="table table-bordered table-hover table-striped">
             <thead>
             <tr>
                 <th width="20px">#</th>
                 <th>اسم الألبوم</th>
                 <th>تاريخ الإضافة</th>
                 <th width="20px">التحكم</th>

             </tr>
             </thead>
             <tbody>
             @foreach($albums as $album)
                 <tr>
                 <td>{{$album->id}}</td>
                 <td>{{$album->name}}</td>
                     <?php

                     $dt = Carbon::parse($album->created_at);
                     $all=  $dt->toDateString();
                             ?>

                 <td>{{$all}}</td>
                     <td>
                         <a class="btn btn-md btn-danger ConfirmAjax " name="{{$album->id}}"   tooltip="تعديل" href="/admin/album/ajaxDelete"><i class="fa fa-edit"></i></a>
                         <button value="{{$album->id}}" class="btn btn-md btn-danger  btn_del"><i class="fa fa-remove"></i></button>
                         <button value="{{$album->id}}" class="btn btn-md btn green btn_edit"><i class="fa fa-edit"></i></button>
                         {{--<a class="btn btn-md btn green"tooltip="تعديل" href="/admin/album/{{$album->id}}/edit"><i class="fa fa-edit"></i></a>--}}
                     </td>
                 </tr>
                 @endforeach

             </tbody>
         </table>
