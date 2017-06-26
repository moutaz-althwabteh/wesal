@if($id != 1)
    <span onclick="deleteThisItem(this)" data-link="{{ url('admin/user/'.$id.'/delete') }}" class="btn purple btn-circle waves-effect waves-circle waves-float" >
         <i class="fa fa-trash"></i>
    </span>
@endif
