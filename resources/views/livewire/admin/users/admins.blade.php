<div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="addcard card">
                    <div class="card-body">
                        <h5 class="card-title ">Create New Admin Account</h5>
                        
                        <hr/>
                        <form wire:submit.prevent="saveAdmin">
                            

                            <div class="row mb-3">
                                
                                <div class="col-md-6">
                                    <label for="name" class="col-md-6 col-form-label ">{{ __('Name') }}</label>
                                    <input id="name" wire:model.defer="name"  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                               
    
                                <div class="col-md-6">
                                    <label for="lname" class="col-md-6 col-form-label ">Last Name</label>
                                    <input id="lname" wire:model.defer="lname"  type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>
    
                                    @error('lname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
    
    
                            <div class="row mb-3">
                                
    
                                <div class="col-md-6">
                                    <label for="email" class="col-md-12 col-form-label ">{{ __('Email Address') }}</label>
                                    <input id="email" wire:model.defer="email"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="phone" class="col-md-12 col-form-label ">Phone Number</label>
                                    <input inputmode="tel" wire:model.defer="phone"  id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                            </div>
    
    
                             <!---address---->
                             <div class="row mb-3">
                                <label for="address" class="col-md-12 col-form-label ">Address</label>
                                <div class="col-md-12">
                                    <textarea id="address" wire:model.defer="address"  style="height:12px;" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address" autofocus>{{ old('address') }}</textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
    
                             
    
                            <div class="row mb-3">
                                
    
                                <div class="col-md-12">
                                    <label for="password"   class="col-md-12 col-form-label ">{{ __('Password') }}</label>
                                    <input id="password" wire:model.defer="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

            
                            </div>

                            <div class="addbtn">
                                <button type="submit" class=" btn btn-primary">ADD</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <h5>Administrators : {{$admin->count()}}</h5>
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($admin as $a)

                                <tr>
                                    <td>{{$a->name}}</td>
                                    <td>{{$a->email}}</td>
                                    <td>
                                        <a class="delbtn" href="#" wire:click.prevent="getAdminId({{$a->id}})"> <i class="bi bi-x-circle-fill"></i>  
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
          title: 'Delete Account ?',
          text: "Are you sure u want to delete the following admin account",
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
  
  window.addEventListener('Admindeleted',event =>{
    Swal.fire(
        'Deleted!',
        'The following account has successfuly been deleted.',
        'success'
      )
  })

</script>
