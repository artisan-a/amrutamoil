import re
import os
import glob

def process_file(filepath):
    with open(filepath, 'r') as f:
        content = f.read()

    # Generic color replacements
    content = content.replace("bg-[#06101e]", "bg-[#fafaf9]") # stone-50
    content = content.replace("bg-[#0f1c2e]", "bg-white")
    content = content.replace("text-amber-50", "text-[#1c1917]") # stone-900
    content = content.replace("text-amber-100/70", "text-[#57534e]") # stone-600
    content = content.replace("text-amber-100/50", "text-[#78716c]") # stone-500
    content = content.replace("text-amber-100/80", "text-[#57534e]") # stone-600
    content = content.replace("border-amber-900/40", "border-stone-200")
    content = content.replace("border-amber-900/20", "border-stone-100")
    content = content.replace("bg-amber-900/20", "bg-stone-100")
    content = content.replace("bg-stone-900", "bg-stone-800")
    
    # Specific layout file cleanups
    if 'app.blade.php' in filepath:
        # Remove cursor elements
        content = content.replace('    <!-- Custom Cursor Base Elements -->\n    <div class="cursor-dot"></div>\n    <div class="cursor-outline"></div>\n', '')
        
        # Remove cursor-dot from js
        content = re.sub(r'const cursorDot = document\.querySelector\(\'\.cursor-dot\'\);\n\s*', '', content)
        content = re.sub(r'const cursorOutline = document\.querySelector\(\'\.cursor-outline\'\);\n\s*', '', content)
        content = re.sub(r'cursorDot\.style\.left = `\$\{posX\}px`;\n\s*cursorDot\.style\.top = `\$\{posY\}px`;\n\s*', '', content)
        # We need to completely remove the GSAP for cursorOutline if there is no outline. The user said: "no need to remove magnetic effect". The magnetic effect animates 'el'. It also used to animate 'cursorOutline'. I'll just remove the cursor properties from the magnetic effect script using regex or exact replace.
        content = re.sub(r'\s*// Enlarge the cursor outline on hover\s*gsap\.to\(cursorOutline, \{[^}]+\}\);\s*', '', content)
        content = re.sub(r'\s*// Reset cursor\s*gsap\.to\(cursorOutline, \{[^}]+\}\);\s*', '', content)
        content = re.sub(r'\s*// GSAP for smooth outline trailing\s*gsap\.to\(cursorOutline, \{[^}]+\}\);\s*', '', content)

    # Footer and headers logic
    content = content.replace("text-stone-400", "text-[#78716c]")
    content = content.replace("text-amber-100 hover:text-amber-400", "text-stone-700 hover:text-amber-600 font-medium")

    with open(filepath, 'w') as f:
        f.write(content)

# Process all blade files
blade_files = glob.glob('resources/views/frontend/**/*.blade.php', recursive=True)
for file in blade_files:
    process_file(file)

print("Theme updated successfully!")
