/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ffos.model;

import java.util.Date;

/**
 *
 * @author tjakopec
 */
public class Operater {
    
    private int sifra;
    private String lokacija;
    private Date datum_mjerenja;
    private int temperatura;
    private String osoba;

    public int getSifra() {
        return sifra;
    }

    public void setSifra(int sifra) {
        this.sifra = sifra;
    }

    public String getLokacija() {
        return lokacija;
    }

    public void setLokacija(String lokacija) {
        this.lokacija = lokacija;
    }

    public Date getDatum_mjerenja() {
        return datum_mjerenja;
    }

    public void setDatum_mjerenja(Date datum_mjerenja) {
        this.datum_mjerenja = datum_mjerenja;
    }

    public int getTemperatura() {
        return temperatura;
    }

    public void setTemperatura(int temperatura) {
        this.temperatura = temperatura;
    }

    public String getOsoba() {
        return osoba;
    }

    public void setOsoba(String osoba) {
        this.osoba = osoba;
    }

    @Override
    public String toString() {
        return this.osoba + ", " + this.lokacija;
    }

        
}
