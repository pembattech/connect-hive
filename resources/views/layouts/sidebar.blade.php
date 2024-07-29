<aside class="sidebar-wrapper bg-white border-b border-gray-100 dark:border-gray-700">

  <div class="flex items-center justify-between">

    <h1 class="p-4 font-semibold text-gray-900 text-xl">Groups</h1>

    <div class="p-2">
      <img class="asset-img opacity-75" src="{{ asset('images/gear.png') }}" alt="setting">
    </div>

  </div>

  {{-- search group --}}
  <div class="w-1/2">
      <input type="text"
          class="w-full px-4 pl-10 text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
          placeholder="Search groups...">
  </div>

  {{-- create group btn --}}

  <button class="mt-2 mb-2 alice-blue flex items-center gap-2 text-blue font-medium text-lg py-2 rounded-lg w-full justify-center">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <line x1="12" y1="5" x2="12" y2="19" stroke="#0000FF" stroke-width="2" stroke-linecap="round"/>
      <line x1="5" y1="12" x2="19" y2="12" stroke="#0000FF" stroke-width="2" stroke-linecap="round"/>
    </svg>
    
    Create new group
  </button>

  {{-- list of groups --}}
  <div class="flex justify-between items-center">
    <h1 class="p-4 font-semibold text-gray-900 text-lg">Groups you've joined</h1>

    <a href="#" class="text-sm text-blue hover-underline">See all</a>
  </div>
    <div class="flex flex-col">
      <div class="flex gap-2 items-center group rounded-lg p-2 hover:bg-gray-100">
      <img class="group-pp-img object-cover rounded opacity-75" src="{{ asset('images/group-images/group_img.jpg') }}" alt="setting">
        Group 1</div>
      <div class="flex gap-2 items-center group p-2 rounded-lg hover:bg-gray-100">
      <img class="group-pp-img object-cover rounded opacity-75" src="{{ asset('images/group-images/group_img.jpg') }}" alt="setting">
        Group 2</div>
      <div class="flex gap-2 items-center group p-2 rounded-lg hover:bg-gray-100">
      <img class="group-pp-img object-cover rounded opacity-75" src="{{ asset('images/group-images/group_img.jpg') }}" alt="setting">
        Group 3</div>
    </div>


</aside>
