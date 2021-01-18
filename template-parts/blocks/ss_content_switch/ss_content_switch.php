<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'content_toggle-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'content_toggle';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$label_1 = get_field('label_1') ?: 'Label 1';
$label_2 = get_field('label_2') ?: 'Label 2';
$content_1 = get_field('content_1') ?: 'Your content here...';
$content_2 = get_field('content_2') ?: 'Your content here...';
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" x-data="{ active: false }">
  <div class="flex items-center space-x-2">
    <span class="font-semibold tracking-tight uppercase text-brand-300" :class="{ 'text-brand-700': active === false }"><?= get_field('label_1'); ?></span>
    <span>

      <!-- On: "bg-indigo-600", Off: "bg-gray-200" -->
      <span :class="{ 'bg-brand-700': active === true }" @click="active = !active" role="checkbox" tabindex="0" aria-checked="false" class="relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out bg-gray-200 border-2 border-transparent rounded-full cursor-pointer w-11 focus:outline-none focus:shadow-outline">
        <!-- On: "translate-x-5", Off: "translate-x-0" -->
        <span :class="{ 'translate-x-5': active === true }" aria-hidden="true" :class="{ 'active': active === true }" class="inline-block w-5 h-5 transition duration-200 ease-in-out transform translate-x-0 bg-white rounded-full shadow"></span>
      </span>
    </span>
    <span class="font-semibold tracking-tight uppercase text-brand-300" :class="{ 'text-brand-700': active === true }"><?= get_field('label_2'); ?></span>
  </div>

  <div x-show="active"><?= get_field('content_1'); ?></div>
  <div x-show="!active"><?= get_field('content_2'); ?></div>
</div>