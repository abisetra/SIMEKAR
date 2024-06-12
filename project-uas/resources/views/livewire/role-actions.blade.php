<div>
    <a class="bg-yellow-500 hover:bg-yellow-700 text-gray-800 font-bold py-2 px-2 rounded" href="{{ route('roles.edit', ['id' => $id]) }}"><i class="fa fa-pen"></i></a>
    <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded inline-flex items-center" onclick="return confirm('Anda yakin ingin menghapus data ini?')" href="{{ route('roles.hapus', $id) }}"><i class="fa fa-trash"></i></a>
</div>
