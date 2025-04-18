{{-- @dd($data) --}}
<x-admin-layout>
    <main class="flex-1 p-6">
        <h2 class="text-2xl font-semibold text-green-900">{{ $title }}</h2>
    
        <!-- Dropdown -->
        <div class="flex justify-between my-4">
            <div class="relative"> 
            </div>
            <div class="flex gap-4">
              <select class="border p-2 rounded bg-white">
                <option>Pilih Pasar</option>
                <option>Pasar Tanjung</option>
              </select>
              <select class="border p-2 rounded bg-white">
                {{-- <option value="" disabled selected>Pilih Periode</option> --}}
                @foreach ($periods as $period)
                    <option value="{{ $period }}">{{ $period }}</option>
                @endforeach
              </select>
              <select class="border p-2 rounded bg-white">
                <option value="" disabled>Minggu Ke</option>
                <option>1</option>
                <option selected>2</option>
                <option>3</option>
                <option>4</option>
            </select>
            </div>
          </div>
          
        
        <!-- Chart Placeholder -->
        <div class="w-full bg-white rounded shadow-md flex items-center justify-center flex-col p-8">
          <div class="flex items-center flex-col mb-3 font-bold text-green-910">
            <h3>Neraca Ketersediaan dan Kebutuhan Bahan Pangan Pokok</h3>
            <h3>Minggu ke 2 Bulan April 2025</h3>
          </div>
          <div id="chart" class="w-full">
            {{-- Chartt --}}
          </div>
        </div>
    
        <!-- Button -->
        <div class="flex justify-center mt-4">
            <a href="{{ route('dkpp.detail') }}">
                <button class="bg-green-700 text-white px-6 py-2 rounded hover:bg-green-800">
                    Lihat Detail Data
                </button>
            </a>
        </div>
    </main>
</x-admin-layout>

<div id="chart"></div>

<script>
  $.ajax({
    type: 'GET',
    url: `{{ route('api.dkpp.index') }}`,
    success: function(response) {
      let dataset = response.data;
      
      let ketersediaan = [];
      let kebutuhan = [];
      let komoditas = [];

      $.each(dataset, function(key, value) {
        ketersediaan.push(value.ton_ketersediaan);
        kebutuhan.push(value.ton_kebutuhan_perminggu);
        komoditas.push(value.jenis_komoditas);
      });

      var options = {
        chart: {
            type: 'line',
            height: 350
        },
        series: [{
            name: 'Ketersediaan',
            data: ketersediaan
        }, {
            name: 'Kebutuhan',
            data: kebutuhan
        }],
        xaxis: {
            categories: komoditas,
        }
      };

      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
      },
    error: function(xhr, status, error) {
      console.log(xhr.responseText);
    }

  });
</script>

