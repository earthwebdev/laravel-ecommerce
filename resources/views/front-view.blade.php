<x-base..front.layout.app>
    <x-slot:title>Ecommerce Laravel</x-slot:title>
    <x-base.front.partial.header />

    <x-base.front.home.slide-comp />

    <x-base.front.home.feature-category-comp />

    <x-base.front.home.feature-product-comp />

    <x-base.front.home.recent-product-comp />
    <x-base.front.home.tag-line-comp />


    <x-base.front.partial.footer />
    <x-slot:scripts>
    <script>
        $('.carousel').carousel({
            interval: 2000
        });
    </script>
</x-slot:scripts>
</x-base..front.layout.app>
