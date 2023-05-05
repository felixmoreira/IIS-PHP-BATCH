net use Z: \\172.16.2.5\pc$
mkdir "Z:historico"
mkdir "Z:historico\%DATE:/=-%"
systeminfo > "Z:historico\%DATE:/=-%\%USERNAME%.txt"
ipconfig /all > "Z:historico\%DATE:/=-%\%USERNAME%_rede.txt"
net use Z: /delete