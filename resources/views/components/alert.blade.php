@props(['type'])

<style>
  .alert-custom {
    background: linear-gradient(135deg, #e0f8e9, #f0fff5);
    border-left: 6px solid #28a745;
    color: #155724;
    transition: all 0.3s ease-in-out;
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1055;
    min-width: 300px;
    max-width: 500px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    opacity: 1;
  }

  .alert-custom.fade-out {
    opacity: 0;
    transition: opacity 0.5s ease;
  }
</style>

<div id="autoDismissAlert" class="alert alert-{{ $type }} alert-custom d-flex align-items-center p-3 rounded" role="alert">
  <i class="fas fa-check-circle me-3 fs-4 text-success"></i>
  <div>
    <strong class="me-1 text-capitalize">{{ $type }}!</strong> {{ $slot }}
  </div>
</div>

<script>
  setTimeout(() => {
    const alert = document.getElementById('autoDismissAlert');
    if (alert) {
      alert.classList.add('fade-out');
      setTimeout(() => alert.remove(), 500); // Wait for fade to complete before removing
    }
  }, 2000); // 2 seconds
</script>
