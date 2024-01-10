
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Tambah Buku</h1>

                    @if ($errors->any())
                    <div>
                        <strong>Error:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('bukus.store') }}" method="POST">
                        @csrf

                        <label for="judul">Judul:</label>
                        <input type="text" name="judul" required>
                        <br>

                        <label for="penulis">Penulis:</label>
                        <input type="text" name="penulis" required>
                        <br>

                        <label for="penerbit">Penerbit:</label>
                        <input type="text" name="penerbit" required>
                        <br>

                        <label for="tahun_terbit">Tahun Terbit:</label>
                        <input type="number" name="tahun_terbit" required>
                        <br>

                        <button type="button" class="btn btn-success">simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
