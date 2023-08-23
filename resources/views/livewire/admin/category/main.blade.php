



<div>

    <div class="card">
     
        
        <div class=" mytitle card-body">
            <h5 class="mytitle card-title">All Catergories
                <a href="{{url('admin/category-add')}}" class="btn mybtn float-end" >Add New Category</a>
            </h5>
            <hr/>
            
        </div>
 

        <div class="card-body">
            <table class="table">
               <thead>
                  <tr>
                     <th scope="col">ID</th>
                     <th scope="col">Category Name</th>
                     <th scope="col">Status</th>
                     <th scope="col">Created On</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                    @foreach ($cat as $c)
                    <tr class="myrow">
                        <th scope="row">{{$c->id}}</th>
                        <td>{{$c->name}}</td>
                        <td>{{$c->status == '0' ? 'Visible':'Hidden'}}</td>
                        <td>{{$c->created_at}}</td>
                        <td>
                            <a href="{{url('category-edit/'.$c->id.'')}}" class="btn tablebtn editbtn">Edit</a>
                            <a href="javascript:void(0)" wire:click.prevent="deleteCat({{$c->id}})"   class="btn tablebtn deletebtn">Delete</a>
                        
                        </td>
                     </tr>
                        
                    @endforeach
                 
               </tbody>
            </table>
            <div>
                {{$cat->links()}}
            </div>
         </div>
    </div>
</div>

@push('script')

<script>


window.addEventListener('showdelConfirm',event =>{

  Swal.fire({
        title: 'Delete Category ?',
        text: "Are you sure u want to delete the following category",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete'
      }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('delConfirmed')
        }
      })
})

window.addEventListener('Catdeleted',event =>{
  Swal.fire(
      'Deleted!',
      'The following category has successfuly been deleted.',
      'success'
    )
})






</script>
    
@endpush