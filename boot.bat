net use Z: \\127.0.0.0\pc$
mkdir "Z:historico"
mkdir "Z:historico\%DATE:/=-%"
systeminfo > "Z:historico\%DATE:/=-%\%USERNAME%.txt"
ipconfig /all > "Z:historico\%DATE:/=-%\%USERNAME%_rede.txt"
net use Z: /delete
