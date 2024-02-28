<x-base..front.layout.app>
    <x-slot:title>Ecommerce Laravel</x-slot:title>
    <x-base.front.partial.header />

    <x-base.front.home.slide-comp />

    <div class="container">

        <div class="row">

        </div>
    </div>
    <x-base.front.partial.footer />
    <x-slot:scripts>
    <script>
        $('.carousel').carousel({
            interval: 2000
        });
    </script>
</x-slot:scripts>
</x-base..front.layout.app>
