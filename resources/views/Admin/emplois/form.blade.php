<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
              @csrf
                <div class="form-group">
                <label for="titre">Titre de l'offre</label>
                <input id="titre" class="form-control form-control-md @error ('titre') is-invalid @enderror" name="titre"
                type="text" placeholder="Insérer un titre" value="{{isset ($emploi) ?  $emploi->titre : old('titre')}} ">
                @error ('titre')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="society">Nom de la société</label>
                            <input id="society" class="form-control form-control-md @error ('society') is-invalid @enderror" name="society"
                            type="text" value="{{isset ($emploi) ?  $emploi->society : old('society')}} ">
                            @error ('society')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="localisation">Lieu du poste à occuper</label>
                            <input id="localisation" class="form-control form-control-md @error ('localisation') is-invalid @enderror" name="localisation"
                            type="text" value="{{isset ($emploi) ?  $emploi->lieu : old('localisation')}} ">
                            @error ('localisation')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Pièces à fournir</label>
                    <textarea name="documents" class="form-control text-justify @error ('documents') is-invalid @enderror" rows="3">{!! isset ($emploi) ?  $emploi->documents : old('documents')  !!}</textarea>
                @error ('documents')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                </div>
                <div class="row">
                    <div class="col-lg-6">
                       <div class="form-group">
                         <label class="col-form-label" for="inlineFormCustomSelect">Type d'offre</label>
                         <select class="custom-select  form-control{{ $errors->has('type_offre') ? ' is-invalid' : '' }}" name="type_offre" id="inlineFormCustomSelect">
                             <option selected disabled>Choisir un type d'offre</option>
                             <option value="Emploi" @if (old('type_offre') == "Emploi") {{ 'selected' }} @endif>Emploi</option>
                             <option value="Stage" @if (old('type_offre') == "Stage") {{ 'selected' }} @endif>Stage</option>
                         </select>
                         @if ($errors->has('type_offre'))
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('type_offre') }}</strong>
                         </span>
                          @endif
                     </div>
                    </div>
                    <div class="col-lg-6">
                     <div class="form-group">
                       <label class="col-form-label" for="">Type de contrat</label>
                       <select class="custom-select  form-control{{ $errors->has('type_contrat') ? ' is-invalid' : '' }}" name="type_contrat" id="">
                           <option selected disabled>Choose one...</option>
                           <option value="CDD" @if (isset ($emploi) ?  $emploi->type_contrat=='CDD' : old('type_contrat') == "CDD") {{ 'selected' }} @endif>Contrat à durée déterminée</option>
                           <option value="CDI" @if (isset ($emploi) ?  $emploi->type_contrat=='CDI' : old('type_contrat') == "CDI") {{ 'selected' }} @endif>Contrat à durée indéterminée</option>
                       </select>
                       @if ($errors->has('type_contrat'))
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('type_contrat') }}</strong>
                       </span>
                        @endif
                   </div>
                  </div>
                 </div>
                <div class="form-group">
                <label for="exampleFormControlTextarea3">Description de l'offre</label>
                <textarea name="description" class="form-control text-justify @error ('description') is-invalid @enderror" id="exampleFormControlTextarea3" placeholder="Insérer une description" rows="7">{!! isset ($emploi) ?  $emploi->description : old('description')  !!}</textarea>
                @error ('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="mail" class="mt-3">Email de l'offre de l' emploi </label>
                            <input id="mail" class="form-control form-control-md @error ('email_post') is-invalid @enderror" name="email_post"
                            type="email" placeholder="Insérer un email" value="{{isset ($emploi) ?  $emploi->email_post : old('email_post')}} ">
                            @error ('email_post')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                     </div>
                    </div>
                    <div class="col-lg-6">
                    <label class="mt-3" for="">Fichier Image</label>
                        <div class="form-group input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error ('image') is-invalid @enderror" name="image" value="{{isset ($emploi) ?  $emploi->image : (old('image'))}}" id="inputGroupFile01"  aria-describedby="">
                                <label class="custom-file-label " for="inputGroupFile01">{{(old('image'))}}</label>
                            </div>
                            @error ('image')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image"  value="{{ old('image') }}"> --}}
                </div>
                <div class="row">
                        {{-- <div class="col-lg-6">
                         <div class="form-group">
                          <label for="deb">Date début</label>
                          <input id="datepicker" class="form-control form-control-md @error ('date_debut') is-invalid @enderror" name="date_debut" type="text" placeholder="Insérer date début" value="{{isset ($emploi) ?  date('m/d/Y',strtotime($emploi->date_debut)) : old('date_debut')}} ">
                           @error ('date_debut')
                               <div class="invalid-feedback">
                                   {{$message}}
                               </div>
                           @enderror
                          </div>
                        </div> --}}
                        <div class="col-lg-6">
                         <div class="form-group">
                          <label for="datepicker2">Date Fin</label>
                            <input id="datepicker2" class="form-control form-control-md @error ('date_fin') is-invalid @enderror" name="date_fin" type="text" placeholder="Insérer une date de fin" value="{{isset ($emploi) ?  date('m/d/Y',strtotime($emploi->date_fin)) : old('date_fin')}} ">
                            @error ('date_fin')
                               <div class="invalid-feedback">
                                   {{$message}}
                               </div>
                           @enderror
                          </div>
                        </div>
                            <script>
                                $('#datepicker').datepicker({
                                    uiLibrary: 'bootstrap4'
                                });
                            </script>
                            <script>
                                $('#datepicker2').datepicker({
                                    uiLibrary: 'bootstrap4',
                                    useCurrent: false
                                });
                            </script>
                            <script>
                                // start date picke on chagne event [select minimun date for end date datepicker]
                                $("#datepicker").on("dp.change", function (e) {
                                    $('#datepicker2').data("datepicker").minDate(e.date);
                                });
                                // Start date picke on chagne event [select maxmimum date for start date datepicker]
                                $("#datepicker2").on("dp.change", function (e) {
                                    $('#datepicker').data("datepicker").maxDate(e.date);
                                });
                                </script>
                    </div>




