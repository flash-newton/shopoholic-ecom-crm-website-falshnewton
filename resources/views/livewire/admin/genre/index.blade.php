<div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="addcard card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Add a Sub-Category</h5>
                        <hr/>
                        <form wire:submit.prevent="saveGenre">
                            <p>Current Sub-Category Count : <span class="subcount">{{$genres->count()}}</span></p>

                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category Type</label> 
                                <select name="category_id" wire:model.defer="category_id"   class="form-control" id="">
                                        <option value="">Please select a proper category</option>
                                    @foreach ($cat as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="text-danger"> {{$message}}</small>   
                                @enderror
                            </div>
                         
                            <div class="mb-3">
                                <label for="name" class="form-label">Sub-Category Name</label>
                                <input type="text" name="name" wire:model.defer="name" class="form-control">
                                @error('name')
                                <small class="text-danger"> {{$message}}</small>   
                                @enderror
                            </div>

                            <div class="addbtn">
                                <button type="submit" class=" btn btn-primary">ADD</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sub Category</th>
                                    <th scope="col">Main Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($genres as $g)

                                <tr>
                                    <td>{{$g->name}}</td>
                                    <td>{{$g->category->name}}</td>
                                    <td>
                                        <a class="delbtn" href="#" wire:click.prevent="getSubCat({{$g->id}})"> <i class="bi bi-x-circle-fill"></i>  
                                            <span>Delete</span> 
                                        </a>
                                    </td>
                                </tr>
                                    @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</div>
<script>


window.addEventListener('showdelConfirm',event =>{
    
      Swal.fire({
            title: 'Delete Sub Category ?',
            text: "Are you sure u want to delete the following sub-category",
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