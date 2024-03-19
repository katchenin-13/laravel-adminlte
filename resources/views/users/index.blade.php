@extends('layouts.app')

@section('content')
<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1">
                    <i class="fa fa-list fa-2x"></i> Liste des Utilisateurs
                </h3>

                <div class="card-tools d-flex align-items-center">
                    <a class="btn btn-link text-white mr-4 d-block" data-toggle="modal" data-target="#ModalCreate">
                        <i class="nav-icon fas fa-users"></i> Nouveau User
                    </a>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" wire:model.debounce.250ms="search"
                               class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width:10%;">No</th>
                            <th style="width:20%;" class="text-center">Name2</th>
                            <th style="width:20%;" class="text-center">Email</th>
                            <th style="width:30%;" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->name }}</td>
                                <td class="text-center">{{ $item->email }}</td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-xxs" role="group" aria-label="Actions">
                                        <a class="btn btn-info mr-2"
                                           href="{{ url('user/'. $item->id) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class="btn btn-primary mr-2"
                                           href="{{ url('user/'. $item->id .'/edit') }}"
                                           data-toggle="modal" data-target="#editUserModal{{ $item->id }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#confirmDelete{{ $item->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            {{-- <div class="card-footer">
                <div class="float-right">
                    {{ $categories->links() }}
                </div>
            </div> --}}
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    @include('users.create')
</div>
@endsection
