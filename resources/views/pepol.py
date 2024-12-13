import numpy as np

class Neuron(object):
    def __init__(self, weights, bias):
        # Menggunakan bobot dan bias yang diinput oleh pengguna
        self.weights = np.array(weights)
        self.bias = bias

    def forward(self, inputs):
        # Menghitung jumlah input * bobot + bias
        cell_body_sum = np.sum(inputs * self.weights) + self.bias
        # Menggunakan fungsi aktivasi ReLU
        firing_rate = max(0, cell_body_sum)
        return firing_rate

# Memasukkan bobot dan bias secara manual
weights = [0.2, -0.5, 0.7, 1.0]  # Contoh bobot
bias = 0.3                       # Contoh bias

# Membuat objek neuron dengan bobot dan bias yang diinput
neuron = Neuron(weights, bias)

# Input untuk neuron
inputs = np.array([1.0, 2.0, -1.5, 0.5])

# Menghitung output neuron
output = neuron.forward(inputs)

# Menampilkan bobot, bias, dan output
print("Bobot:", neuron.weights)
print("Bias:", neuron.bias)
print("Input:", inputs)
print("Output neuron:", output)
