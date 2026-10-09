<!-- Modal -->
<div class="modal fade" id="{{ $id }}" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h1 class="modal-title w-100 text-center fs-5">{{ $title ?? '' }}</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="mdi mdi-window-close"></i>
        </button>
      </div>
      <div class="modal-body">
        {{ $slot }}
      </div>
    </div>
  </div>
</div>