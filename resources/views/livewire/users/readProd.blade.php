{{-- @if ($request->user()->can('read')) --}}
@if (auth()->user()->can('read'))
            <div class="modal fade" id="readmodalProp" tabindex="-1" role="dialog" wire:ignore.self>
                <div class="modal-dialog" style="top:50px;">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #15a1e2; color: white;">
                            <h5 class="modal-title">Détails User</h5>
                        </div>
                        <div class="form-group">
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            @if($selectedUser)
                                                <tr>
                                                    <td><strong>Nom:</strong></td>
                                                    <td>{{ $selectedUser->name }}</td>
                                                </tr>

                                                <tr>
                                                    <td><strong>Email:</strong></td>
                                                    <td>{{ $selectedUser->email }}</td>
                                                </tr>

                                                <tr>
                                                    <td><strong>Password:</strong></td>
                                                    <td>{{ $selectedUser->password }}</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" wire:click="closeUserModal"><i class="fas fa-times"></i> Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
@endif
