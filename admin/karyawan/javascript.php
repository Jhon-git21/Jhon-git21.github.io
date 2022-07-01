

<style>
.tanggal {
  width: 100px;
  max-width: 100%;
}
</style>

<link rel="stylesheet" href="https://unpkg.com/vue2-timepicker@1.1.3/dist/VueTimepicker.css">
<script src="assets/js/vue.js" type="text/javascript"></script>
<script src="https://unpkg.com/vue2-timepicker@1.1.3/dist/VueTimepicker.umd.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/moment@2.29.1/moment.js" type="text/javascript"></script>
<script>

  var jumlah_hari = <?php echo date('t') ?>;

  $input = new Vue({
    el: '#input-nilai',
    components: { VueTimepicker: VueTimepicker.default },
    data() {
      return {
        hello: "Hello world! Testing",
        jumlah_hari: jumlah_hari,
        jam_kerja: [],
        kehadiran: [],
        jam_lembur: [],
      }
    },
    mounted() {
      // console.log(this.$refs);
      for(var tanggal = 1; tanggal <= this.jumlah_hari; tanggal++)
      {
        this.jam_kerja.push({
          tanggal: tanggal,
          masuk: "08:00",
          pulang: "16:00",
          nilai: 8,
        })
      }
      for(var tanggal = 1; tanggal <= this.jumlah_hari; tanggal++)
      {
        this.kehadiran.push({
          tanggal: tanggal,
          nilai: 1,
        })
      }
      for(var tanggal = 1; tanggal <= this.jumlah_hari; tanggal++)
      {
        this.jam_lembur.push({
          tanggal: tanggal,
          nilai: 0,
        })
      }

      // console.log(this.timeDiff("08:00", "16:00"));
    },
    methods: {
      timeDiff(time_start, time_end) {
        var start = moment(new Date("January 01, 2021 " + time_start + ":00")); 
        var end = moment(new Date("January 01, 2021 " + time_end + ":00")); 
        var duration = moment.duration(end.diff(start));
        var hours = duration.asHours();
        return isNaN(hours) ? 0 : hours;
      },
      cek_jamkerja(index, masuk, pulang) 
      {
        let jam = this.timeDiff(masuk,pulang)
        // console.log(jam)
        if(jam > 8) {
          alert('Mohon maaf! Jam kerja melebihi 8 jam/hari.');
          this.jam_kerja[index].masuk = "08:00";
          this.jam_kerja[index].pulang = "16:00";
        }
      },
      onChangeJam(eventData, indexItem)
      {
        let masuk = this.jam_kerja[indexItem].masuk;
        let pulang = this.jam_kerja[indexItem].pulang;
        let jam = this.timeDiff(masuk,pulang)
        if(jam==0) {
          this.kehadiran[indexItem].nilai = 0;
        }
        // console.log(eventData)
      },
      onChangeKehadiran(event, index)
      {
        // console.log(index)
        if(event.target.value == 0) {
          this.jam_kerja[index].masuk = {HH:"",mm:""};
          this.jam_kerja[index].pulang = {HH:"",mm:""};
        }
      },
      cek_lembur(index) 
      {
        if(this.$refs['nilai-4'] && this.$refs['nilai-4'].value > 6) {
          alert('Mohon maaf! 1 bulan hanya dapat jatah 7 kali lembur.');
          this.jam_lembur[index].nilai = 0;
        }
      },
      total_jamkerja() {
        let total = 0;
        this.jam_kerja.forEach(item=>{
          total += this.timeDiff(item.masuk, item.pulang)
        })
        console.log('total jam_kerja',total)
        if(this.$refs['nilai-1'])
        {
          this.$refs['nilai-1'].value = total;
        }
        // return total;
      },
      total_kehadiran() {
        let total = 0;
        this.kehadiran.forEach(item=>{
          total += isNaN(item.nilai) ? 0 : item.nilai
        })
        console.log('total kehadiran',total)
        if(this.$refs['nilai-3'])
        {
          this.$refs['nilai-3'].value = total;
        }
        // return total;
      },
      total_jamlembur() {
        let total = 0;
        this.jam_lembur.forEach(item=>{
          total += item.nilai
        })
        console.log('total lembur',total)
        if(this.$refs['nilai-4'])
        {
          this.$refs['nilai-4'].value = total;
        }
        // return total;
      }
    },
    computed: {

    }
  });

  var detail_nilai = <?php echo $detail_nilai ?>;
  var jam_kerja = detail_nilai.jam_kerja;
  var kehadiran = detail_nilai.kehadiran;
  var jam_lembur = detail_nilai.jam_lembur;

  $ubah = new Vue({
    el: '#ubah-nilai',
    components: { VueTimepicker: VueTimepicker.default },
    data() {
      return {
        jumlah_hari: jumlah_hari,
        jam_kerja: jam_kerja,
        kehadiran: kehadiran,
        jam_lembur: jam_lembur,
      }
    },
    mounted() {
      console.log(this.$refs)
      if(!this.jam_kerja || this.jam_kerja.length == 0) {
        this.seeder();
      }
    },
    methods: {
      seeder() {
        for(var tanggal = 1; tanggal <= this.jumlah_hari; tanggal++)
        {
          this.jam_kerja.push({
            tanggal: tanggal,
            masuk: "08:00",
            pulang: "16:00",
            nilai: 8,
          })
        }
        for(var tanggal = 1; tanggal <= this.jumlah_hari; tanggal++)
        {
          this.kehadiran.push({
            tanggal: tanggal,
            nilai: 1,
          })
        }
        for(var tanggal = 1; tanggal <= this.jumlah_hari; tanggal++)
        {
          this.jam_lembur.push({
            tanggal: tanggal,
            nilai: 0,
          })
        }
      },
      timeDiff(time_start, time_end) {
        var start = moment(new Date("January 01, 2021 " + time_start + ":00")); 
        var end = moment(new Date("January 01, 2021 " + time_end + ":00")); 
        var duration = moment.duration(end.diff(start));
        var hours = duration.asHours();
        return isNaN(hours) ? 0 : hours;
      },
      cek_jamkerja(index, masuk, pulang) 
      {
        let jam = this.timeDiff(masuk,pulang)
        // console.log(jam)
        if(jam > 8) {
          alert('Mohon maaf! Jam kerja melebihi 8 jam/hari.');
          this.jam_kerja[index].masuk = "08:00";
          this.jam_kerja[index].pulang = "16:00";
        }
      },
      onChangeJam(eventData, indexItem)
      {
        let masuk = this.jam_kerja[indexItem].masuk;
        let pulang = this.jam_kerja[indexItem].pulang;
        let jam = this.timeDiff(masuk,pulang)
        if(jam==0) {
          this.kehadiran[indexItem].nilai = 0;
        }
        // console.log(eventData)
      },
      onChangeKehadiran(event, index)
      {
        // console.log(index)
        if(event.target.value == 0) {
          this.jam_kerja[index].masuk = {HH:"",mm:""};
          this.jam_kerja[index].pulang = {HH:"",mm:""};
        }
      },
      cek_lembur(index) 
      {
        if(this.$refs['nilai-4'] && this.$refs['nilai-4'].value > 6) {
          alert('Mohon maaf! 1 bulan hanya dapat jatah 7 kali lembur.');
          this.jam_lembur[index].nilai = 0;
        }
      },
      total_jamkerja() {
        let total = 0;
        this.jam_kerja && this.jam_kerja.forEach(item=>{
          total += this.timeDiff(item.masuk, item.pulang)
        })
        console.log('total jam_kerja',total)
        if(this.$refs['nilai-1'])
        {
          this.$refs['nilai-1'].value = total;
        }
        // return total;
      },
      total_kehadiran() {
        let total = 0;
        this.kehadiran && this.kehadiran.forEach(item=>{
          total += isNaN(item.nilai) ? 0 : parseInt(item.nilai)
        })
        console.log('total kehadiran',total)
        if(this.$refs['nilai-3'])
        {
          this.$refs['nilai-3'].value = total;
        }
        // return total;
      },
      total_jamlembur() {
        let total = 0;
        this.jam_lembur && this.jam_lembur.forEach(item=>{
          total += parseInt(item.nilai)
        })
        console.log('total lembur',total)
        if(this.$refs['nilai-4'])
        {
          this.$refs['nilai-4'].value = total;
        }
        // return total;
      }
    },
    computed: {

    }
  });
</script>