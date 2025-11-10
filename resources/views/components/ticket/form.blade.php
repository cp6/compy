@props([
    'action' => '#',
    'method' => 'POST',
])

<form action="{{ $action }}" method="{{ $method }}" {{ $attributes }}>
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif
    
    <div class="space-y-6">
        {{-- Title --}}
        <div>
            <x-form.label for="title" value="Title" required />
            <x-form.input 
                id="title" 
                name="title" 
                type="text" 
                :value="old('title')" 
                required 
                placeholder="Enter ticket title"
                class="mt-1"
            />
            <x-form.error name="title" />
        </div>
        
        {{-- Category --}}
        <div>
            <x-form.label for="category" value="Category" />
            <x-form.select 
                id="category" 
                name="category" 
                :options="[
                    'technical' => 'Technical Support',
                    'billing' => 'Billing',
                    'feature' => 'Feature Request',
                    'bug' => 'Bug Report',
                    'other' => 'Other',
                ]"
                placeholder="Select a category"
                class="mt-1"
            />
            <x-form.error name="category" />
        </div>
        
        {{-- Priority --}}
        <div>
            <x-form.label for="priority" value="Priority" />
            <x-form.select 
                id="priority" 
                name="priority" 
                :options="[
                    'low' => 'Low',
                    'medium' => 'Medium',
                    'high' => 'High',
                    'urgent' => 'Urgent',
                ]"
                value="medium"
                class="mt-1"
            />
            <x-form.error name="priority" />
        </div>
        
        {{-- Description --}}
        <div>
            <x-form.label for="description" value="Description" required />
            <x-form.textarea 
                id="description" 
                name="description" 
                rows="6"
                required
                placeholder="Describe your issue in detail..."
                class="mt-1"
            >{{ old('description') }}</x-form.textarea>
            <x-form.error name="description" />
        </div>
        
        {{-- Submit Button --}}
        <div class="flex items-center justify-end gap-3">
            <x-button.secondary type="button" onclick="history.back()">
                Cancel
            </x-button.secondary>
            <x-button.primary type="submit">
                Create Ticket
            </x-button.primary>
        </div>
    </div>
</form>

