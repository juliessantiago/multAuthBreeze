<div>
    <input type="text"  class="form-control mb-4 rounded" wire:model.live="search" placeholder="Procurar por usuário" />
    <table class="min-w-full divide-y divide-pink-800"> <!--table-auto adapta o tamanho das colunas de acordo com o 
        conteúdo--> 
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> 
    {{$users->links()}}
</div>
