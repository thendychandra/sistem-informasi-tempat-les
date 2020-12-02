<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Push.js Tutorial</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.5/push.min.js"></script>
</head>
<body>
  <h1>Push.js Tutorial</h1>
  <p>Klik tombol di bawah untuk memunculkan notifikasi.</p>
  <button id="notify">Tampilkan Notifikasi</button>
  <script>
    document.getElementById('notify').addEventListener('click', () => {
      Push.Permission.request(() => {
        Push.create('Kodinger.com', {
          body: 'Hello, ini adalah notifikasi dari tutorial Kodinger.com.',
          icon: 'https://kodinger.com/wp-content/uploads/2016/04/kod-1.jpg',
          timeout: 3000,
          onClick: () => {
            alert('Notifikasi diklik, bosku!');
          }
        });
      });
    });
  </script>
</body>
</html>