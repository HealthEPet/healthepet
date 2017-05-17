



    <div class="allContent">
@extends('layouts.master')

@section('content')

		<div class="welcomeHeaderAccountPage">
			Welcome to your pets page, {{ Auth::user()->name }}.
		</div>
        
        @if(session()->has('alert-success'))
            <div class="alert-success">{{ session()->get('alert-success') }}</div>
        @endif

        @if(session()->has('alert-danger'))
            <div class="alert-danger">{{ session()->get('alert-danger') }}</div>
        @endif

        @if(\Auth::User()->user_type == 'vet')

		@endif

        <?php $i=1; ?>
		@foreach($pets as $pet)

			<div class="col-sm-6 petInformation">

                <div class="col-xs-offset-1 col-xs-3">
                    <img class="petHeaderPicture" src="/img/{{ $pet->img == null ? 'default.png' : $pet->img }}" alt="dog/cat picture">

                </div>  

                <div class="col-xs-offset-2 col-xs-5 petDescriptionBody">

                    <div class="col-xs-12 petNameVet">{{ $pet->petName }}</div>

                    
                    <form action="{{ action('PetsController@image', $pet->id) }}" method="post" enctype="multipart/form-data" novalidate>
                    {!! csrf_field() !!}
                        <div class="addImage col-xs-12">Upload {{ $pet->petName }}'s picture here!</div>

                        <input type="hidden" name="pet_id" value="{{ $pet->id }}">

                        <div class="col-xs-12">
                            <label for="fileToUpload{{ $pet->id }}" id="chooseFile" class="chooseFile">
                                <input type="file" name="fileToUpload" id="fileToUpload{{ $pet->id }}" class="hiddenInputFileUpload<?= $i ?>" required>Choose File
                            </label>
                        </div>

                        <div class="col-xs-12">
                            <div class="col-xs-12 fileUploadLink fileUploadLink<?= $i ?>"></div>
                        </div>

                        <div class="col-xs-12">
                            <label for="submit{{ $pet->id }}" class="chooseFile">
                                <input type="submit" value="Upload Image" name="submit" id="submit{{ $pet->id }}" hidden>Upload Image
                            </label>
                        </div>

                    </form>

                </div>

                <div class="col-xs-12 petOwnerRecordsLink">
                    <a href="/pets/{{ $pet->id }}">Click here to view {{ $pet->petName }}'s records <i class="fa fa-file-text-o" aria-hidden="true"></i></a>
                </div>

			</div>
            <?php $i++; ?>
		@endforeach
        </div>

        <div class="col-xs-12 paginationHolder">
          {!! $pets->render() !!}
        </div>

@stop
