@foreach($unreadNotifications as $notification)
    <a href="{{ route('notification.read', $notification->id) }}" class="dropdown-item {{ $notification->read_at ? '' : 'bg-light' }}">
        <div class="media">
            <i class="fas fa-truck"></i>
            <div class="media-body">
                <h3 class="dropdown-item-title">
                    {{ $notification->data['message'] }}
                    <span class="float-right text-sm text-muted">
                        <i class="far fa-clock mr-1"></i>
                        {{ $notification->created_at->diffForHumans() }}
                    </span>
                </h3>
            </div>
        </div>
    </a>
    <div class="dropdown-divider"></div>
@endforeach

<a href="#" class="dropdown-item dropdown-footer">Voir toutes les notifications</a>
<style>
.bg-light {
    background-color: #f8f9fa;
    font-weight: bold; /* Exemple pour différencier les notifications non lues */
}
</style>
