<x-admin-layout>
  <x-slot name="script">
    <script>
      ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
          console.error(error);
        });
    </script>
  </x-slot>

  <div class="mx-auto w-full px-6 py-6">
    <!-- table 1 -->
    <div class="-mx-3 flex flex-wrap">
      <div class="w-full max-w-full flex-none px-3">
        <div
          class="dark:bg-slate-850 dark:shadow-dark-xl relative mb-6 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid border-transparent bg-white bg-clip-border shadow-xl">
          <div class="border-b-solid mb-4 rounded-t-2xl border-b-0 border-b-transparent p-6 pb-0">
            <h6 class="dark:text-white">Tambah Layanan</h6>
          </div>
          <div class="flex-auto px-3 py-5 pt-0 pb-2">
            @if ($errors->any())
              <div class="mb-5" role="alert">
                <div class="rounded-t bg-red-500 px-4 py-2 font-bold text-white">
                  Ada kesalahan!
                </div>
                <div class="rounded-b border border-t-0 border-red-400 bg-red-100 px-4 py-3 text-red-700">
                  <p>
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                  </p>
                </div>
              </div>
            @endif
            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <!-- Input Text | Name -->
              <div class="-mx-3 mb-6 flex flex-wrap">
                <div class="w-full px-3">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="motto"> Nama Layanan : </label>
                  <input value="{{ old('name') }}" name="name"
                    class="mb-1 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                    type="text" placeholder="Masukkan Nama Layanan" required />
                  <div class="mt-0 text-sm text-gray-500">
                    Nama Layanan. Contoh: Annual Report, Calendar, dsb. Wajib diisi. Maksimal 255 karakter.
                  </div>
                </div>
              </div>

              <!-- Input Text | Icon -->
              <div class="-mx-3 mb-6 flex flex-wrap">
                <div class="w-full px-3">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="motto"> Icon Layanan : </label>
                  <input name="icon"
                    class="mb-1 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                    type="text" required />
                  <div class="mt-0 text-sm text-gray-500">
                    Flutter Icon. Contoh: 0xee34, 0xf521. Opsional.
                    <a href="https://api.flutter.dev/flutter/material/Icons-class.html" target="_blank" class="text-blue-700">refrence</a>
                  </div>
                </div>
              </div>

              <!-- Input Number | Icon Background -->
              <div class="-mx-3 mb-6 flex flex-wrap">
                <div class="w-full px-3" style="width: 25%">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="r"> Red : </label>
                  <input value="{{ old('r') }}" name="r" min="1" max="255"
                    class="mb-3 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-1 px-3 leading-normal text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                    type="number" placeholder="Red" required />
                </div>
                <div class="w-full px-3" style="width: 25%">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="r"> Green : </label>
                  <input value="{{ old('g') }}" name="g" min="1" max="255"
                    class="mb-3 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-1 px-3 leading-normal text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                    type="number" placeholder="Green" required />
                </div>
                <div class="w-full px-3" style="width: 25%">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="r"> Blue : </label>
                  <input value="{{ old('b') }}" name="b" min="1" max="255"
                    class="mb-3 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-1 px-3 leading-normal text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                    type="number" placeholder="Blue" required />
                </div>
                <div class="w-full px-3" style="width: 25%">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="r"> Alpha : </label>
                  <input value="{{ old('a') }}" name="a" min="0" max="1" step=".1"
                    class="mb-3 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-1 px-3 leading-normal text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                    type="number" placeholder="Alpha / Opacity" required />
                </div>
                <div class="w-full px-3">
                  <div class="mt-0 text-sm text-gray-500">
                    Warna Icon. Contoh: (255,155, 100, 0.8). Opsional.
                  </div>
                </div>
              </div>

              <!-- Input Select | Category -->
              <div class="-mx-3 mb-6 flex flex-wrap">
                <div class="w-full px-3">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="Kategori"> Kategori : </label>
                  <div class="relative">
                    <select name="category_id"
                      class="block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 pr-8 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                      id="status">
                      <option value="">Masukkan Kategori Layanan Anda</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id' == $category->id ? 'selected' : '') }}>
                          {{ $category->name }}
                        </option>
                      @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"></div>
                    <div class="mt-1 text-sm text-gray-500">
                      Kategori layanan. Contoh: Corporation, Branding, dsb. Wajib diisi.
                    </div>
                  </div>
                </div>
              </div>

              <!-- Input Text | Motto -->
              <div class="-mx-3 mb-6 flex flex-wrap">
                <div class="w-full px-3">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="motto"> Motto Layanan : </label>
                  <input value="{{ old('motto') }}" name="motto"
                    class="mb-1 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                    type="text" placeholder="Masukkan Motto singkat untuk Layanan Anda" required />
                  <div class="mt-0 text-sm text-gray-500">
                    Motto Layanan. Contoh: Pelayanan Optimal. Wajib diisi. Maksimal 255 karakter.
                  </div>
                </div>
              </div>

              <!-- Input Textarea | Detail -->
              <div class="-mx-3 mb-6 flex flex-wrap">
                <div class="w-full px-3">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="Subjek"> Detail Layanan : </label>
                  <div class="mt-2">
                    <textarea id="editor" name="detail"
                      class="mb-3 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                      placeholder="Masukkan Detail Untuk Layanan Anda"></textarea>
                  </div>
                </div>
              </div>

              <!-- Input File | Images -->
              <div class="-mx-3 mb-6 flex flex-wrap">
                <div class="w-full px-3">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="motto"> Images : </label>
                  <input type="file" name="images[]" accept="image/png, image/jpeg, image/jpg, image/webp"
                    class="mb-1 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                    placeholder="Masukkan Motto singkat untuk Layanan Anda" multiple />
                  <div class="mt-0 text-sm text-gray-500">
                    Foto layanan. Lebih dari satu foto dapat diupload. Opsional
                  </div>
                </div>
              </div>

              <!-- Button Submit -->
              <div class="-mx-5 mb-2 flex flex-wrap">
                <button type="submit"
                  class="active:opacity-85 bg-x-25 mb-0 inline-block cursor-pointer rounded-lg border-0 bg-transparent bg-black px-4 py-2.5 text-center align-middle text-sm font-bold leading-normal text-white shadow-none transition-all ease-in hover:-translate-y-px dark:text-white">
                  <i class="fas fa-plus mr-2 text-white" aria-hidden="true"></i>Simpan
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <footer class="pt-4">
      <div class="mx-auto w-full px-6">
        <div class="-mx-3 flex flex-wrap items-center lg:justify-between">
          <div class="mt-0 mb-6 w-full max-w-full shrink-0 px-3 lg:mb-0 lg:w-1/2 lg:flex-none">
            <div class="text-center text-sm leading-normal text-slate-500 lg:text-left">
              ©
              <script>
                document.write(new Date().getFullYear() + ",");
              </script>
              made with <i class="fa fa-heart"></i> by
              <a href="https://www.creative-tim.com" class="font-semibold text-slate-700 dark:text-white" target="_blank">Creative Tim</a>
              for a better web.
            </div>
          </div>
          <div class="mt-0 w-full max-w-full shrink-0 px-3 lg:w-1/2 lg:flex-none">
            <ul class="mb-0 flex list-none flex-wrap justify-center pl-0 lg:justify-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="block px-4 pt-0 pb-1 text-sm font-normal text-slate-500 transition-colors ease-in-out"
                  target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation"
                  class="block px-4 pt-0 pb-1 text-sm font-normal text-slate-500 transition-colors ease-in-out" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://creative-tim.com/blog"
                  class="block px-4 pt-0 pb-1 text-sm font-normal text-slate-500 transition-colors ease-in-out" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license"
                  class="block px-4 pt-0 pb-1 pr-0 text-sm font-normal text-slate-500 transition-colors ease-in-out" target="_blank">License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
</x-admin-layout>
