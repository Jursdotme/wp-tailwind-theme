<?php

$images = (get_field('gallery')) ? get_field('gallery') : get_field('galleri');

if ($images) :
?>

  <div x-data="{ imgModal : false, imgModalSrc : '', imgModalDesc : '' }">
    <template @img-modal.window="imgModal = true; imgModalSrc = $event.detail.imgModalSrc; imgModalDesc = $event.detail.imgModalDesc;" x-if="imgModal">
      <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform" x-transition:enter-end="opacity-100 transform" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform" x-transition:leave-end="opacity-0 transform" x-on:click.away="imgModalSrc = ''" class="fixed inset-0 z-50 flex items-center justify-center w-full p-2 overflow-hidden bg-black bg-opacity-75 h-100">
        <div @click.away="imgModal = ''" class="flex flex-col max-w-3xl max-h-full overflow-auto">
          <div class="relative h-screen overflow-hidden">
            <img :alt="imgModalSrc" class="object-contain h-screen" :src="imgModalSrc">
            <button @click="imgModal = ''" class="absolute float-right pt-2 pr-2 outline-none focus:outline-none right-2 top-2">
              <svg class="text-white fill-current " xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                </path>
              </svg>
            </button>
            <p x-text="imgModalDesc" class="absolute z-50 w-full text-center text-white bottom-2"></p>
          </div>
        </div>
      </div>
    </template>
  </div>

  <div x-data="{}" class="grid grid-cols-4 gap-8 mt-16">

    <?php foreach ($images as $image) : ?>


      <a @click="$dispatch('img-modal', {  imgModalSrc: '<?php echo esc_url($image['url']); ?>', imgModalDesc: '<?php echo esc_html($image['caption']); ?>' })" class="overflow-hidden rounded shadow-lg cursor-pointer">
        <img alt="Placeholder" class="w-full object-fit" src="<?php echo esc_url($image['sizes']['thumbnail']); ?>">
      </a>


    <?php endforeach; ?>
  </div>
<?php endif; ?>