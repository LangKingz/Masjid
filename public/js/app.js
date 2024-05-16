// Make a GET request
fetch('https://api.myquran.com/v2/sholat/jadwal/2009/2024-05-16')
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {
    const jadwal = data;
    const waktu_sholat = jadwal.data.jadwal;

    console.log(waktu_sholat);
  })
  .catch(error => {
    console.error('Error:', error);
  });
  $('#co').hide();
