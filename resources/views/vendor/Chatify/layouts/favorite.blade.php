<div class="favorite-list-item">
    <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
        style="background-image: url('{{ asset('/storage/'.config('chatify.user_avatar.folder').'/'.$user->avatar) }}');">
    </div>
    <p>{{ strlen($user->nama_majelis) > 5 ? substr($user->nama_majelis,0,6).'..' : $user->nama_majelis }}</p>
</div>
