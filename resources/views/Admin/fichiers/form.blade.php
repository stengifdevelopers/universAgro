                    @csrf
                    <input hidden class="form-control form-control-md @error ('pro_id') is-invalid @enderror" name="pro_id"
                    type="text"  value="{{  $projet->id  }} ">
                        
                   <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="title">Titre du Fichier</label>
                            <input id="title" class="form-control form-control-md @error ('title') is-invalid @enderror" name="title"
                            type="text" value="{{isset ($emploi) ?  $emploi->lieu : old('title')}} ">
                            @error ('title')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class=" col-lg-6">
                      <div class="form-group">
                        <label for="tof" class="h6">Fichier</label><br>
                        <input type="file" name="nom"   value="{{old('nom')}}" id="tof" class="text-center center-block file-upload form-control">
                        @if ($errors->has('nom'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nom') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                   </div>
                   
                    
                   
