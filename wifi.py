import pywifi
from pywifi import const

wifi = pywifi.PyWiFi()  # Inisialisasi objek WiFi
iface = wifi.interfaces()[0]  # Menggunakan antarmuka WiFi pertama

iface.scan()  # Melakukan pemindaian jaringan WiFi
scan_results = iface.scan_results()

ssid_to_check = "DIRA"
bssid_to_check = "34:60:f9:f3:77:7e"

for result in scan_results:
    if result.ssid == ssid_to_check and result.bssid == bssid_to_check:
        print(f"Terhubung ke jaringan WiFi dengan SSID: {ssid_to_check}, BSSID: {bssid_to_check}")
        break
else:
    print("Tidak terhubung ke jaringan WiFi dengan SSID dan BSSID yang diberikan.")
