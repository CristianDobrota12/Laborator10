using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Xamarin.Forms;

namespace App1
{
    public partial class MainPage : ContentPage
    {
        public MainPage()
        {
            InitializeComponent();
        }

        private async void bt_Calculeaza_Clicked(object sender, EventArgs e)
        {
            try
            {
                double Lungime = double.Parse(enLungime.Text);
                double Latime = double.Parse(enLatime.Text);
                if(Exista(Lungime,Latime))
                {
                    double perimetru = 2 * (Lungime + Latime);
                    double aria = Lungime * Latime;
                    lbRezultat.Text = "Perimetru dreptunghiului este" + perimetru.ToString("F3") + "\n" + "Aria dreptunghiului este" + aria.ToString("F3");
                    
                }
                else
                {
                    await DisplayAlert("Eroare" , "Nu exista asa dreptunghi" , "OK");
                }
            }
            catch(Exception)
            {
                await DisplayAlert("Eroare", "Nu exista asa dreptunghi" , "OK");
            }
        }

        private bool Exista(double lungime, double latime)
        {
            if (lungime > 0 && latime > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}
