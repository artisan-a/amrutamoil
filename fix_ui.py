import re

# Fix app.blade.php navbar links
path = 'resources/views/frontend/layouts/app.blade.php'
with open(path, 'r') as f:
    content = f.read()

content = content.replace('text-stone-700 hover:text-amber-600', 'text-amber-100 hover:text-amber-400 font-bold')

with open(path, 'w') as f:
    f.write(content)

# Fix contact.blade.php
path = 'resources/views/frontend/contact.blade.php'
with open(path, 'r') as f:
    content = f.read()

content = content.replace('text-stone-700', 'text-amber-100/80')
content = content.replace('border-stone-300', 'border-amber-900/40 bg-[#06101e] text-amber-50')
content = content.replace('bg-stone-900', 'bg-amber-600')

with open(path, 'w') as f:
    f.write(content)

# Fix show.blade.php
path = 'resources/views/frontend/products/show.blade.php'
with open(path, 'r') as f:
    content = f.read()

content = content.replace('text-stone-700', 'text-amber-100/80')
content = content.replace('text-stone-400', 'text-amber-100/50')
content = content.replace('border-stone-300', 'border-amber-900/40 bg-[#06101e] text-amber-50')

with open(path, 'w') as f:
    f.write(content)

# Restore beautiful images on About and Process pages
path = 'resources/views/frontend/about.blade.php'
with open(path, 'r') as f:
    content = f.read()

content = content.replace("{{ asset('images/brand-mockups.png') }}", "https://images.unsplash.com/photo-1596647248564-964689cf61bb?auto=format&fit=crop&w=800&q=80")

with open(path, 'w') as f:
    f.write(content)

path = 'resources/views/frontend/process.blade.php'
with open(path, 'r') as f:
    content = f.read()

content = content.replace("{{ asset('images/brand-mockups.png') }}", "https://images.unsplash.com/photo-1506544777464-b0a1f0ae0072?auto=format&fit=crop&w=600&q=80", 1) # Only first replace
with open(path, 'w') as f:
    f.write(content)

with open(path, 'r') as f:
    content = f.read()
content = content.replace("{{ asset('images/brand-mockups.png') }}", "https://images.unsplash.com/photo-1596647248564-964689cf61bb?auto=format&fit=crop&w=600&q=80")
with open(path, 'w') as f:
    f.write(content)

