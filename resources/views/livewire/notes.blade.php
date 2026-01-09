<div class="relative mb-6 w-full">
    <flux:heading size="xl" level="1">{{ __('Notes') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Manage Notes') }}</flux:subheading>
    <flux:separator variant="subtle" />

    {{--  Create Note Modal Trigger --}}
    <flux:modal.trigger name="create-note">
        <flux:button class="mt-2">Create Note</flux:button>
    </flux:modal.trigger>

    @session('success')
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => { show = false }, 3000)"
            class="fixed top-5 right-5 bg-green-600 text-white text-sm p-4 rounded-lg shadow-lg z-50" role="alert">
            {{ session('success') }}
        </div>
    @endsession
    {{--  Call the Create Note Modal --}}
    <livewire:create-note />
</div>
