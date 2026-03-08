import os
import glob

views = glob.glob('resources/views/frontend/**/*.blade.php', recursive=True)

# Replacements
replacements = {
    'bg-stone-50': 'bg-[#06101e]',
    'bg-white': 'bg-[#0f1c2e]',
    'text-stone-900': 'text-amber-50',
    'text-stone-800': 'text-amber-100',
    'text-stone-600': 'text-amber-100/70',
    'text-stone-500': 'text-amber-100/50',
    'border-stone-100': 'border-amber-900/40',
    'border-stone-200': 'border-amber-900/50',
    'bg-stone-100': 'bg-amber-900/20',
    'hover:bg-amber-50': 'hover:bg-amber-900/30',
    'bg-amber-50': 'bg-amber-900/20',
    'bg-yellow-50': 'bg-amber-900/20',
}

for path in views:
    with open(path, 'r') as f:
        content = f.read()
        
    for old, new in replacements.items():
        content = content.replace(old, new)
        
    # Extra fix for app.blade.php inline style
    if 'layouts/app.blade.php' in path:
        content = content.replace('background-color: #fdfbf7;', 'background-color: #06101e;')
        content = content.replace('color: #3e362e;', 'color: #fef08a;')
        content = content.replace('background: rgba(253, 251, 247, 0.9);', 'background: rgba(6, 16, 30, 0.9);')
    
    with open(path, 'w') as f:
        f.write(content)

print(f"Updated {len(views)} files.")
